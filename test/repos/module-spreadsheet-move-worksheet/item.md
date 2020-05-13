---
title: 'Move a Worksheet Between Workbooks'
morea_id: module-spreadsheet-move-worksheet
morea_type: module
published: true
---
# Follow-along Demo

1. From Excel, open the `cart_flat.csv` file you extracted to `EF105/data`.
2. Right-click on the worksheet tab "cart_flat" and select "Move or Copy..."
   
   ::: collapse Screenshot
   ![screen capture of excel worksheet with context menu open and "Move or Copy" selected](pix/screencap_move_worksheet_1.png)
   :::
3. On the dialog menu that appears adjust the "To book" dropdown to select your `lab04_{{netid}}.xlsx` workbook. Click "OK".
   
   ::: collapse Screenshot
   ![screen capture: excel "Mode or Copy" dialog window](pix/screencap_move_worksheet_2.png)
   :::
4. You should now have a new worksheet named "cart_flat" in your `lab04_{{netid}}` workbook.

# Practice

Repeat the steps above to move the data from `cart_incline.csv` to a
new worksheet in your `lab04_{{netid}}` workbook.

Your workbook should now have three worksheets: "cart_incline", "cart_flat", and "Lazy Dog's Walk"

![screen capture: Excel worksheet tabs showing three worksheets, "cart_inline", "cart_flat", and "Lazy Dog's Walk"](pix/screencap_practice_worksheets.png)

# Auto-Adjust Cell Widths

You may notice that the default width of the columns does not let you
easily view the full contents of the cells. You can resize columns
automatically to fit the contents by double-clicking on the divider
between columns on the column header.

To auto-resize a single column, double-click the divider bar between
the column you want to resize and the next column.

@[video]({{wwwroot}}/vid/excel_single_column_autowidth)

You can also auto-resize all columns at once by first selecting all
cells in the worksheet. Then double-click the divider bar between any
column.

@[video]({{wwwroot}}/vid/excel_all_column_autowidth)
