---
title: 'Removing Rows and Columns'
morea_id: module-remove-rows-and-columns
morea_type: module
published: true
---
Switch to the "cart_flat" worksheet if not already selected. <!-- {.alert .alert-info} -->

# Remove Unused Columns

For today's lab we are only going to be using position, velocity, and
acceleration data. To make the worksheet easier to manage, remove
columns F and higher.

1. Select column "F" by clicking the column header
2. Hold down <kbd>Ctrl</kbd>+<kbd>Shift</kbd> and while still holding, press <kbd>&#8594;</kbd> (right arrow).
3. Press the <kbd>Delete</kbd> key.
   <div class="html5-video" data-file="{{wwwroot}}/vid/excel_remove_columns_right"></div>

# Remove Unused Row

The data file we loaded has an additional header row with the text
"Run #1" in each cell. Because we only have data for one run, this row
is not useful to us and we can remove it.

1. Right click the number to the left of the row you wish to delete
2. Select "Delete" from the drop-down list

<div class="html5-video" data-file="{{wwwroot}}/vid/excel_delete_row"></div>

Notice that because we moved our worksheet into our `lab04_[netid]` workbook we are *not* modifying the original data file. If we ever wish to do additional analysis that would require any of the columns we removed we can always make another copy from the original, safe in our `EF105/data` folder. <!-- {p:.alert .alert-warning} -->

# Practice

Switch to the "cart_incline" worksheet. <!-- {.alert .alert-info} -->

Repeat the same steps to remove unused rows and columns of the "cart_incline" worksheet.
