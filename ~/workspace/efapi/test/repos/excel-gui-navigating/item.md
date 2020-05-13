---
title: Navigating
morea_id: excel-gui-navigating
morea_type: reading
published: true
---
<div class="row">
<div class="col-md-5">

<object class="svg-highlight" type="image/svg+xml" data="{{wwwroot}}/modules/excel/pix/excel_gui_annotation.svg"
	data-attribute-selector="#excel-gui-annotations">
	<img src="{{wwwroot}}/modules/excel/pix/excel_gui_annotation.png" />
</object>

</div>

<div class="col-md-6">

Identify the various portions of the screen:
		
name box <!-- {#name-box} -->
	
: used to give a variable name to a cell or range of cells.
	
formula area <!-- {#formula-box} -->
	
: used to insert/edit formulas.
    
active cell <!-- {#g-active-cell} -->
	
: The active cell is shown with a green boarder. Any names entered to
  the name box, or formulas entered in the formula area apply to the
  active cell. Notice how the column letter and row number are
  highlighted. This cell is F4 because it is in column F and row 4.
    
worksheets <!-- {#worksheets} -->
	
: can be renamed, copied, moved, etc; allows multiple spreadsheets within the same file. Typically we will use one worksheet per problem.

<!-- {dl:#excel-gui-annotations} -->

## Cell and Cell Range Referencing

Look at how the cells are referenced: (Column Letter)(Row Number), e.g.
- F6: cell in column F, row 6
- C3: cell in column C, row 3

The colon operator specifies the range of cells:
    
- B8:B15: A vertical group in column B, rows 8-15.
- D12:G12: A horizontal group on row 12, columns D-G
- F15:H19: A rectangular group spanning rows 15-19 and columns F-H

</div>
</div>
