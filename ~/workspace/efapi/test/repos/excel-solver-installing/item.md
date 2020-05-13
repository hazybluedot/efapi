---
title: 'Excel''s Solver'
morea_id: excel-solver-installing
morea_type: experience
published: true
---
## One-time Installation

The Solver does not come standard in Excel, but is available as an
Add-in, which you will only have to do once (per computer).

Click on the Data tab. If Solver does not appear, follow these steps
to install the add-in.

::: aside Install Solver on a Mac
1. Go to Tools -> Add-ins
2. Check the "Solver Add-In" box.
3. Click "OK"
:::

1. Go to File -> Options -> Add-ins	
2. At the bottom under Manage: "Excel Add-ins", click Go.\
   ![](pix/addin-alt.jpg)

3. In the Add-Ins available window, select the "Solver Add-in" check box, and
   then click OK.\
   ![](pix/addin2-alt.jpg)

Solver should now appear under the Data tab, in the upper right corner.\
![](pix/yaysolver-alt.jpg)

You will not have to do this again for this machine. The solver will
remain in the Data tab.

<!-- :break section -->

## Getting to know Solver:

<div class="row">
<div class="col-md-6">

<object class="svg-highlight" id="solver-overview" type="image/svg+xml" data="pix/solverbox.svg"
	data-attribute-selector="#excel-solver-annotations">
	<img src="pix/solverbox.png" />
</object>

</div>

<div class="col-md-6">

Objective Cell <!-- {#set-objective-box} -->

: Enter a cell reference or name for the objective cell. The objective
  cell must contain a formula. Select:
  - `Max` if  you want the value of the objective cell to be as large as possible,
  - `Min` if you want the value of the objective cell to be as small as possible,
  - `Value of` if you want the value of the objective cell to reach a specific value.
  
Variable Cells <!-- {#variable-cells-box} -->

: Enter a name or reference for each decision variable cell
  range. Separate the non-adjacent references with commas. The
  variable cells must be related directly or indirectly to the
  objective cell. You can specify up to 200 variable cells.
  
Subject to the Constraints <!-- {#constraints-box} -->

: In the Subject to the Constraints box, enter any constraints that
  you want to apply by doing the following:
  - In the **Solver Parameters dialog box**, click **Add**.
  - In the **Cell Reference** box, enter the cell reference or name of
	the cell range for which you want to constrain the value.
  - Click the relationship (<code>&lt;=</code>, `=`, <code>&gt;=</code>, `int`, `bin`, or `dif`)
    that you want between the referenced cell and the constraint.
  - If you choose `int`, `bin`, or `dif` then "integers", "binary", or
    "AllDifferent" will appear in the Constraint Box, respectively.
  - If you choose <code>&lt;=</code>, `=`, or <code>&gt;=</code> for the relationship in the Constraint box, type a number, a cell reference or name, or a formula.
  - Do one of the following:
    - To accept the constraint and add another, click "Add".
	- To accept the constraint and return to the Solver Parameters
      dialog box, click "OK".
<!-- {dl:#excel-solver-annotations} -->
</div>
</div>
