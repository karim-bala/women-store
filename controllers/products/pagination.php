<?php

$current_page = isset($_GET['page'])? (int)$_GET['page']:1;

$totalItems = getallitemsformdb();

$totalPages = ceil($totalItems/$itemsPerPage );


// Calculate the offset for the database query based on the current page and items per page.
$offset = ($current_page - 1) * $itemsPerPage;
$itemsPerPage  = 10;
$items = getPaginatedItemsFromDatabase($offset, $itemsPerPage);


/////////////////////////////////////////////////////////////////////////
echo '<ul class="pagination">';

// Display the "Previous" link if not on the first page
if ($current_page > 1) {
    echo '<li><a href="?page=' . ($current_page - 1) . '">Previous</a></li>';
}

// Display the page numbers
for ($i = 1; $i <= $totalPages; $i++) {
    echo '<li' . ($i === $current_page ? ' class="active"' : '') . '><a href="?page=' . $i . '">' . $i . '</a></li>';
}

// Display the "Next" link if not on the last page
if ($current_page < $totalPages) {
    echo '<li><a href="?page=' . ($current_page + 1) . '">Next</a></li>';
}

echo '</ul>';



///////////////////////////////////////////////////////////////////////////
echo '<ul class="pagination">';

// Display the "Previous" link if not on the first page
if ($current_page > 1) {
    echo '<li><a href="?page=' . ($current_page - 1) . '">Previous</a></li>';
}

// Determine how many page links you want to display on each side of the current page
$linksToShow = 3; // Adjust this number as needed

$startPage = max(1, $current_page - $linksToShow);
$endPage = min($totalPages, $current_page + $linksToShow);

// Add "..." before the first page if necessary
if ($startPage > 1) {
    echo '<li><span>...</span></li>';
}

// Display the page numbers
for ($i = $startPage; $i <= $endPage; $i++) {
    echo '<li' . ($i === $current_page ? ' class="active"' : '') . '><a href="?page=' . $i . '">' . $i . '</a></li>';
}

// Add "..." after the last page if necessary
if ($endPage < $totalPages) {
    echo '<li><span>...</span></li>';
}

// Display the "Next" link if not on the last page
if ($current_page < $totalPages) {
    echo '<li><a href="?page=' . ($current_page + 1) . '">Next</a></li>';
}

echo '</ul>';
