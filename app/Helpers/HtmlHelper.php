<?php

// app/Helpers/HtmlHelper.php

namespace App\Helpers;

class HtmlHelper
{
    public static function extractTextFromHtml($htmlCode, $numLines = 3)
    {
        // Extract text
        $text = strip_tags($htmlCode);

        // Limit to specified number of lines
        $textLines = explode("\n", $text);
        $text = implode("\n", array_slice($textLines, 0, $numLines));

        return $text;
    }

    public static function metaForm($metaData = "")
    {
        // Decode the JSON string in meta_details
        $metaDetails = json_decode($metaData->meta_details??'');

        return '
            <div class="card-body">
                <h3>Meta Settings</h3>
                <div class="form-group">
                    <label for="metaTitle">Title</label>
                    <input type="text" class="form-control" id="metaTitle" name="meta_title" placeholder="Enter title" value="' . htmlspecialchars($metaDetails->meta_title ??'') . '">
                </div>
                <div class="form-group">
                    <label for="metaKeywords">Keywords</label>
                    <input type="text" class="form-control" id="metaKeywords" name="meta_keywords" placeholder="Enter keywords" value="' . htmlspecialchars($metaDetails->meta_keywords ??'') . '">
                </div>
                <div class="form-group">
                    <label for="metaDescription">Description</label>
                    <input type="text" class="form-control" id="metaDescription" name="meta_description" placeholder="Enter Description" value="' . htmlspecialchars($metaDetails->meta_description ??'') . '">
                </div>
            </div>
        ';
    }

    public static function getMeta($metaData = "")
    {
        // Decode the JSON string in meta_details
        $metaDetails = json_decode($metaData->meta_details??'');

        return '
            <meta name="keywords" content="' . htmlspecialchars($metaDetails->meta_keywords ??'') . ' ">
            <meta name="title" content="' . htmlspecialchars($metaDetails->meta_title ??'') . '">
            <meta name="description" content="' . htmlspecialchars($metaDetails->meta_description ??'') . '">
            <title>' . htmlspecialchars($metaDetails->meta_title ??'') . ' </title>
        ';
    }

}
