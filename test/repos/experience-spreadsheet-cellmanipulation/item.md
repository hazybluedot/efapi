---
title: 'Manipulating and Naming Cells'
published: true
morea_id: experience-spreadsheet-cellmanipulation
morea_type: experience
morea_summary: 'Practice adding, removing, moving, and naming cells'
morea_labels:
    - 'In class'
---
<!-- NOTE:
This section is a long sequence of different demoed spreadsheet operations. Remind students that they are not expected to memorize everything shown here, they can treat this section as a reference and come back to it as needed when working on the practice exercises. Choose just a couple of skills to demo and be sure to draw attention to the different named UI components that are relevant to help students reinforce their association of those definitions (name box, formula area, active cell, worksheets)
-->

## Example

Use this [start file.](/ef105/modules/excel/example_start.xlsx) Right click and "save link
as" excel_exercise.xlsx in your H:\\EF105\Lab03 folder. Create the folder if
necessary and replace 'netid' with your actual netid. It's important to
show all your work in this file because it will be submitted at the end
of lab.

Start Excel and open the file. **IMPORTANT!** When you are working from
any kind of start file in this lab, make sure it does NOT say "Protected
View" or "Read Only" at the top. This is only a temporary file (you
opened it directly from the link) and will not save properly.

![](/ef105/modules/excel/pix/protectedview_1.png)
![](/ef105/modules/excel/pix/protectedview_2.png)

If you do open a file this way and see "Protected View" or "Read Only"
at the top, select File -> "Save As" and save the file to your H drive
or another location of your choosing.

<!-- :break section -->
# Navigation

## Example

 Click any cell, notice it has a black box around it. This is the
active cell. You can move between cells by using the arrow keys or by
clicking the cell you want. If you enter data (numbers or letters)
into a cell and hit ENTER, your active cell will be the next cell in
the same column below where you were. If you hit TAB, your active cell
will be the next cell in the same row adjacent to the right. By
holding SHIFT and hitting ENTER or TAB it will make the active cell go
up or to the left, respectively.

## Example

 Click and hold down and drag your cursor in any direction to
select a group of cells. While they are still highlighted enter data
into the upper left cell (Notice it is white and the rest are blue)
and hit ENTER, Excel will only scroll down through the highlighted
cells for data entry or navigation and then move to the next
column. Similar navigation occurs for TAB, SHIFT-TAB, and SHIFT-ENTER.

You can navigate to the beginning or end of a row or column by
selecting any cell in the row or column and pressing Ctrl + (any
arrow). You can also double click any edge of the black box to achieve
this as well!

Mac Users: Use the Command key instead of Ctrl for all Microsoft
programs. There are a few exceptions noted in the labs. {.os .os-mac}

Cycling quickly between worksheets can be done quickly by hitting
`Ctrl + Page up` or `Ctrl + Page Down`

# Selecting Cells

- Clicking on a single cell will select that cell. It is not the *active* cell.
- Clicking a row number will select the entire row of data.
- Clicking a column letter will select the entire column of data.
- Clicking and dragging from a cell will select a rectangular range of data.
- Clicking a cell and pressing Ctrl + Shift + (any arrow) will select
  a series of data from the starting cell in the direction of the
  arrow.

<!-- :break section -->
# Naming Cells

An individual cell or a group of cells can be given a specific name.

## Example

 Select the student birth month data (cells B3:B14). Click in the
Name Box and give it the name “Students”. You will use this later.

# Moving Cells or Sets of Data

An individual cell or a group of cells can be moved by selecting the
cell or cells and grabbing the edge of the black box and dragging
where ever you want.

<!-- :break section -->
# Deleting Cells

To delete the contents of a cell: click the cell so the black box is around it and push the delete key on your keyboard.

To delete the cell: click the cell so the black box is around it and right click the cell so a drop box appears. Select “delete” and a box will appear asking how you want to move the cells around it once it is deleted.

## Example

Test this in the Practice worksheet by deleting Texas in cell E5
because it doesn’t belong. If you just use the delete key, Texas is
gone but the problem of the gap in the data is not solved. If you just
delete the cell with Texas in it, all of the data will be wrong.

## Example

Deleting works the same way when selecting rows and columns or other
combinations of cells. Try selecting multiple cells using any of the
methods listed above, then right click the selection and select
"delete".

Test this by properly deleting the cell with Texas in it and the cell
to the right.

<!-- :break section -->
# Inserting Cells, Columns, and Rows
To insert a cell or cells, select the cell or cells you want to insert
next to, then right click and select insert. A box will appear asking
you how you want to shift the cells to insert new ones. Excel will
default to the most obvious choice based on your selection. If the
entire row or column is selected an entire new row or column will be
inserted above or to the left, respectively. Undo anything you insert
so it does not interfere with the rest of these directions.

<!-- :break section -->
# Data Entry

You can simply type data into a cell by selecting the cell and typing
or into a range of cells as mentioned in the Navigation section. Excel
will also try to auto fill cells if what you start typing in is a
pattern it recognizes.

## Example 
1. Under Days of the Week in cell `I2`, type the number `1`. 
2. Grab the little black box in the bottom right corner of the cell
and drag down. Notice it fills the cells with the number `1`. 
3. Undo this (`CTRL+ Z`). Now type a `2` in cell `I3`, select both
`I2` and `I3`. 
4. Grab the black box and drag down. Notice Excel assumes a pattern
and continues to fill 1,2,3,4,5,… 
5. Try this with odd or even number, or any pattern you want to see
how Excel reacts. Try this with the days of the week, type Monday or
Mon into cell I2 and drag to the side or down. Try with the months as
well.

Notice how Excel will fill in with the rest of the days of the
week. And then repeat the pattern.

<!-- :break section -->
# Copy and Pasting

You can copy and paste data within Excel by selecting the cell or cells
and right clicking and selecting copy/paste or by the short cuts you
learned: `Ctrl + C` and `Ctrl + V`. Notice when data has been copied a “fuzzy
box” appears around the data. To remove the selection hit `ESC`.

::: aside Alternate Method
Another way to access the paste options is to
select a cell, such as H20, making it active. Then along the Home
ribbon, click the down arrow next to the Paste button. Here you have
the same past options, for example "Transpose".
:::

## Example

Select the list of months and copy them. Paste them in cell H20.  If
you use Ctrl + V they are pasted exactly the same, if you right click
in H20 a menu appears. Notice there are many Paste Options; Values,
Formulas, Transpose… Select Transpose to make the copied column data
become row data.

Mac users: Select the list of months and copy them. Then right click in
cell H20 and select Paste Special. A menu box will appear giving you
different options. Check the box next to Transpose to make the copied
column data become row data. {.os .os-mac}

## Example 

You can also insert copied cells. Select a column or row of data and
copy it. Then right click a different row or column header (1,2,3,…
or A,B,C,...) and select insert copied cells. **Undo this action so it
does not interfere with the rest of these directions.**
