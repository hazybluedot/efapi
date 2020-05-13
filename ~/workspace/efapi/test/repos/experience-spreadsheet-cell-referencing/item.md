---
title: 'Relative and Absolute Cell References'
published: true
morea_type: experience
morea_id: experience-spreadsheet-cell-referencing
morea_summary: 'Practice using relative and absolute cell referencing'
---
When copying and pasting formulas to different cells, there are two possible ways references can be pasted:

1. Relative references are automatically changed so that they cells they reference are *relative* to the location of the pasted formula.
2. Absolute references stay the same in pasted formulas, regardless of its location.

## Relative References

By default, all cell references are relative references. What this
means is that when a formula containing cell references is copied to a
new location, cell references automatically change based on the
relative position of rows and columns. For example, if you copy the
formula `=A1+B1` from one row to the one below it, the pasted formula
will become `=A2+B2`.

### Example

1. Create a list of odd numbers from 1 to 39 starting in cell A1.
2. Let’s say we want to know what each pair of odd number adds up to
   (what is the result of 1+3, 3+5, 5+7, …). Write a formula in B2 that sums together A1
   and A2.
3. Copy this formula down to B20, you can drag the little black box in
   the corner of the cell down. Notice how the cells that are
   referenced in the formula change as the formula is copied
   down. 

## Absolute References

To make a reference absolute, you add a dollar sign (`$`) in front of
the column letter, row number, or both, depending on what you want to
stay the same when the formula is pasted to a new location.

### Example

Now let's say we want to calculate the ratio of each sum to the max
value in B20, that is we want to calculate B2/B20, B3/B20, etc.

1. Select cell C2 and enter the formula `=B2/B20`. Try copying it down through `B20`. 
2. Starting at `C4` and onward you should see something like `#DIV/0!`
   indicating your formula is trying to divide by 0! This is because the numerator is changing, but we don't want it to!
3. Undo the duplication of the formula (`Ctlr + Z`) and modify the formula in `C2` to be `=B2/B$20`.
4. Copy the new formula through `C20`. The result in `C20` should be `1`, and the formula there should now be `=B20/B$20`.

In this example, because we were duplicating the formula across rows
but staying in the same column we only needed the `$` in front of the
row number `20`. See what happens if you try copying one of the cells
in the `C` column to the `D` and `E` column. If you wanted to fix the
numerator across to column `C` *and* row `20`, you would specify the
reference as `$B$20`.
