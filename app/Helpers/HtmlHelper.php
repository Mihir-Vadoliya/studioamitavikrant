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
}
