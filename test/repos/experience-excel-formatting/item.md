---
title: 'Formatting Cells in Excel'
published: true
morea_id: experience-excel-formatting
morea_type: experience
morea_summary: 'Learn how to format cells in Excel'
morea_labels:
    - Extraneous
---
<!-- NOTE:
Don't spend much time demoing any of the formatting and styling stuff for now.

Mention that spreadsheet software can be used for two distinct activities: data analysis and data presentation. In general these two tasks are supported by different skill-sets. We are going to focus on the data analysis skills for now.
-->

-   Let us come back to the Practice tab. Notice how cell A1 says
    “Student’s Birthdays”, but it is cut off by the next columns data.
    To make a column (or row) as wide as the words in it double click
    the column divider between A and B. To do this to all of the columns
    (or rows) first click the blank cell to the left of A and above 1
    (this selects all the data), then double click any column divider.
-   If text is really long in a cell you can wrap the words to make the
    row height increase and move the text to the line below. This is
    important when making tables or summarizing data. Select cell I1
    with “Days of the Week” and under the Home tab select Wrap Text.
    Then resize the cell using the column divider so the text wraps in
    the cell.
-   You can align the data within a cell both vertically and
    horizontally. Select all of the data and under the Home tab select
    the Center icon.

## Freezing Rows and Columns

When working with large sheets of data and you have to scroll down you
lose the column titles (or row titles). You can freeze the top row or
multiple rows. When freezing multiple rows it is important to remember
that the rows above the one that is selected will freeze.  NOT the row
that is selected. 

### Example

 Select Row 3 then under the View tab click on Freeze Panes and
select Freeze Panes, but remember there are other options. To unfreeze
the panes follow the same steps except an Unfreeze Panes options is
now available.

## Formatting Numeric Data

Numerical data within a cell can be formatted to display in many
different types. Select column F, right click and select “Format
Cells”. Under the Number tab, general is the default, but they can be
formatted to numbers and the number of decimal points displayed can be
changed. There are many other format options, take a second to look at
some of them.

## Sorting

::: aside Dual Purpose Feature
Like several other spread sheet features described in this section, sorting has uses in both data analysis and presentation. In the analysis phase, it can be a useful to visualize interesting features in the data, but as a general rule, never perform operations that modify the data, such a sorting, on the only copy of your raw data.
:::

Data can be sorted numerically or alphabetically. Select the column
with the Students Favorite Colors in it (Column E). Under the Data
tab there are 2 buttons AZ with a down arrow and ZA with a down
arrow. The AZ button will sort the column from smallest to largest
or from A to Z, whereas the ZA button will sort largest to smallest
or from Z to A. When you select one of these a box will appear,
notice that “Expand the Selection” is the default. 

1. First try this using the “Continue with current selection” and see
how the color names will move, but the numbers do not. This is bad
because now you have ruined your data! Also notice that Excel is smart
enough to realize the top 2 rows are not part of the colors list and
does not sort them! 
2. Now sort the column again this time using the default “Expand the
Selection”. Notice that the numbers move with the color names, but it
did not affect the Students Birthdays columns. This is because Excel
will only expand the selection to columns adjacent that have data in
them, so it will stop at the first empty column.  What is the most
popular color? (this would obviously be more helpful if there were a
lot more colors)

## Cell style

::: aside Alternative Method
Style options can also be found in the Home ribbon.
:::

Cell style properties such as color, background, boarder, and many
others can be found by right-clicking a cell, or cell range.

![](/ef105/modules/excel/pix/formatting-alt.jpg)

