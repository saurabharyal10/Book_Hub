
<?php
function truncateDescription($description, $limit)
{
    // Explode the description into an array of words
    $words = explode(" ", $description);

    // Check if the number of words exceeds the limit
    if (count($words) > $limit) {
        // Truncate the array to the specified limit
        $words = array_slice($words, 0, $limit);

        // Join the truncated words back into a string
        $truncated_description = implode(" ", $words);

        // Add "..." to indicate truncation
        $truncated_description .= " ...";

        return $truncated_description;
    } else {
        // If the number of words is within the limit, return the original description
        return $description;
    }
}
?>