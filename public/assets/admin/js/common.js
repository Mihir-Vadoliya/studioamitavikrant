$(document).on('click', '.delete', function () {
    let url = $(this).data('url');
    let tableId = '#' + $(this).data('table');
    deleteConfirmation(url, tableId);
});

function deleteConfirmation(url, tableId) {
    window.swal.fire({
        title: 'Are you sure?',
        text: "You want to delete this record",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.value) {
            window.swal.fire({
                title: "",
                text: "Please wait...",
                showConfirmButton: false,
                backdrop: true
            });

            window.axios.delete(url).then(response => {
                if (response.status === 200) {
                    window.swal.close();
                    $(tableId).DataTable().ajax.reload();

                    // Show toast message
                    window.toast.fire({
                        icon: 'success',
                        title: response.data.message
                    });
                }
            }).catch(error => {
                window.swal.close();
                // Show toast message
                window.toast.fire({
                    icon: 'error',
                    title: error.response.data.message
                });
            });
        }
    });
}

function toastMessage(message = '', status = '') {
    status = status=='' ? 'error' : status;

    if (message=='')
        message = status=='error' ? 'Something went wrong' : 'Success';

    window.toast.fire({
        title: message,
        icon: status,
    });
}

$('body').on('click', '[data-act=ajax-modal]', function () {
    const _self = $(this);

    const content = $("#ajax_model_content");
    const spinner = $("#ajax_model_spinner");

    content.hide();
    spinner.show();

    $("#ajax_model").modal({backdrop: 'static'});
    $("#ajax_model_title").html(_self.attr('data-title'));
    var metaData = {};
    $(this).each(function () {
        $.each(this.attributes, function () {
            if (this.specified && this.name.match("^data-post-")) {
                var dataName = this.name.replace("data-post-", "");
                metaData[dataName] = this.value;
            }
        });
    });

    axios({
        method: _self.attr('data-method'),
        url: _self.attr('data-action-url'),
        data: metaData
    })
    .then(response => {
        spinner.hide();
        if (response.status === 200) {
            content.html(response.data).show();
            $('.form-select-modal').select2({
                dropdownParent: $('.modal')
            });
        }
        else {
            toastMessage();
        }
    }).catch(error => {
        spinner.hide();
        toastMessage(error.response.data.message);
    });
});

$('body').on('submit', '[data-form=ajax-form]', function(e) {
    e.preventDefault();
    const form = this;
    const confirm = $(form).data('confirm');

    if (confirm=='yes') {
        window.swal.fire({
            title: 'Are you sure?',
            text: "Do you really want to submit this form?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Yes, do it!"
        }).then((result) => {
            if (result.value) sendAjaxForm(form);
        });
    } else {
        sendAjaxForm(form);
    }
});

function sendAjaxForm(form) {
    const _self = $(form);
    const btn = _self.find('[data-button=submit]');
    const btnHtml = btn.html();
    const modal = _self.data('modal');
    const dt = _self.data('datatable');
    const reload = _self.data('reload');

    btn.attr('disabled', 'disabled');
    btn.html(btnHtml + '&nbsp;&nbsp;<span class="spinner-border spinner-border-sm"></span>');

    axios({
        url: _self.attr('action'),
        method: _self.attr('method'),
        data: new FormData(_self[0]),
    })
    .then(response => {
        if (response.status == 200) {
            if (modal !== '') $(modal).modal('hide');
            if (dt !== '') $(dt).DataTable().ajax.reload();
            $('#grantTokenForm').trigger('reset');
            toastMessage(response.data.message, 'success');
            if (response.data.reload === 'true') window.location.reload();
            
            if (response.data.back_url)
            {
                $(location).attr('href', response.data.back_url);
            }
        }

        else toastMessage();
    })
    .catch(error => {
        toastMessage(error.response.data.message);
    })
    .finally(response => {
        btn.removeAttr('disabled');
        btn.html(btnHtml);
    });
}

// to show uploaded image
function addFileEventToLabel(file_id, label_id, preview_id) {
    // for board signature
    const label = document.getElementById(label_id),
        file_input = document.getElementById(file_id),
        preview = document.getElementById(preview_id);

    label.addEventListener("click", function (e) {
        if (file_input) {
            file_input.click();
        }
        e.preventDefault(); // prevent form default action sign_image_preview
    }, false);

    file_input.addEventListener('change', function () {
        const file = file_input.files[0];
        let reader = new FileReader();

        reader.addEventListener("load", function () {
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
            $('#upload-btn').show();
        }
    });
}

// to approve and disapprove user
$(document).on('click', '.approve, .disapprove', function () {
    let url = $(this).data('url');
    let tableId = $(this).data('table');
    let tr = $(this).closest('tr');
    let rowData = $(tableId).DataTable().row(tr).data();
    let action = $(this).hasClass('approve') ? 'active' : 'rejected';

    var data = {
        'id': rowData.id,
        'status': action,
    }

    processRequest(url, tableId, data);
});

// to process the request of approval and disapproval
function processRequest(url, tableId, formData) {
    var message = formData.status === 'active'
        ? `<label class="col-form-label">
                You want to approve this
            </label>`
        : `<label class="col-form-label">
                Please, provide disapproval reason:
            </label>
            <textarea name="rejected_reason" id="disapproval_reason" class="form-control" rows="3"></textarea>`;
    window.swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        html: message,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Yes",
    }).then((result) => {
        formData['rejected_reason'] = $('[name=rejected_reason]').val()
        if (result.value) {
            window.swal.fire({
                title: "",
                text: "Please wait...",
                showConfirmButton: false,
                backdrop: true
            });
            window.axios.post(url, formData).then(response => {
                if (response.status === 200) {
                    window.swal.close();
                    $(tableId).DataTable().ajax.reload();

                    // Show toast message
                    window.toast.fire({
                        icon: 'success',
                        title: response.data.message
                    });
                }
            }).catch(error => {
                window.swal.close();
                // Show toast message
                window.toast.fire({
                    icon: 'error',
                    title: error.response.data.message
                });
            });
        }
    });
}
