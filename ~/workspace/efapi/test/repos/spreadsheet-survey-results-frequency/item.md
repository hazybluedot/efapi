---
title: 'Counting Number of each Response'
morea_id: spreadsheet-survey-results-frequency
morea_type: reading
morea_summary: 'Follow along an example using spreadsheets to calculate the frequencies of responses to a survey'
morea_labels:
    - 'New: array functions'
published: true
---
It is useful to count how many responses of each value (e.g. "None", "Very little", etc.) occur.

## Generate a Frequency Table

``` facilitator-guide
Remind students that they do not need to follow along for now. We will be doing the same analysis for both survey questions. Just watch and ask questions now, then they will have a chance to practice with the second survey question.
```

::: aside Alternative
Using `FREQUENCY` is not the only way to get the result we want. Another method is to use the `COUNTIF` function 5 times:

```
=COUNTIF(A:A, "=1")
=COUNTIF(A:A, "=2")
=COUNTIF(A:A, "=3")
=COUNTIF(A:A, "=4")
=COUNTIF(A:A, "=5")
```

Can you think of other ways to get the same results? Why might you choose one way over another?
:::

We need a way to count the number of survey responses that are `1`,
the number that are `2`, etc. If you conduct an internet search for
"calculate frequency of values in a spreadsheet" you should get
results that indicate the `FREQUENCY` function will do this for
us. This function is a bit different from others we have worked
with. Other functions, such as `SUM` return a **single** value. The
`FREQUENCY` function is going to return an **array** of values, one
value for each number 1,2,3,4, and 5. That is, the first value will be
the number of times a `1` occurs, the second value the number of times
a `2` occurs, etc.

### Frequencies of Responses to Question 1

Note: We will repeat these steps to analysis Question 2. The first
time through, just watch and ask questions about steps that are not
clear.

1. Switch to the `lab03 survey results` sheet in your `lab04-[netid]` workbook.
1. Paste in the response meaning table for "Question 1" above into
   this sheet. A good location would be pasting into E3
   
   ![](pix/survey_analysis-1.png){.screencap}
3. Select 5 vertical cells to the right of the table you just pasted
   in. This will be the result array for the `FREQUENCY` function.
   
   ![](pix/survey_analysis-2.png){.screencap}   
4. In the formula area, type `=FREQUENCY(`. Notice that the software
   shows information about what arguments the function is
   expecting. In this case, `FREQUENCY` is expecting two arguments:
   1. The data from which frequencies will be calculated. This will be our list of survey results for Question 1.
   2. The list of values that we want to count, this will be the 5
      cells containing the numbers 1-5.

   ![](pix/survey_analysis-3.png){.screencap}

5. Fill in the ranges for the data and bin values:
   - Rather than scrolling all the way to the bottom of the long list
     of data, select the first cell of data, then press `Ctrl +
     Shift + ↓`. Type `,` to complete the first argument and press
     `Ctrl + ↑` to bring the selected cell back to the top of the
     list. Use the arrow keys to navigate to `E6` and press `Ctrl +
     Shift + ↓` to select the range of response values. Type `)` to
     finish the formula.

   ![](pix/survey_analysis-4.png){.screencap}

6. Press `Ctrl + Shift + Enter` (hold down `Ctrl` and `Shift`, and
   while still holding, press `Enter`). This is a special key
   combination you use when entering an array formula, like
   `FREQUENCY`
6. Add the label "Number" above your frequency output. You should now
   see the frequency of each response value in the cell corresponding
   to each value.
   
   ::: aside Remember 
   You can auto-resize columns or rows to fit
   their contents by double-clicking on the separators between column
   letters or row numbers.
   :::
   
   ![](pix/survey_analysis-5.png){.screencap}
   
   Note: your values may differ from the screen shot, the CSV file you
   downloaded was created after more responses had been entered.

### Tip

To make changes to an array function such as `FREQUENCY`:
1. First select the full range of cells containing the output array,
2. the modify the formula in the formula bar,
3. finally press `Ctrl + Shift + Enter` to save the changes.

## Calculating the Proportion of Each Response

Now that we have the number of responses for each level, it would be
helpful to know what proportion of the responses are `1`, what
proportion are `2`, etc. Conducting an internet search for "how do I
find the number of values in a spreadsheet?" should return some
results suggesting that the `COUNT` function can be used for this
purpose.

1. In a new cell enter the label "Total:", a good place for this is
   `E1`. You will also need this for question 2 analysis, so if you
   are not following along just make a note to check back here to
   complete this and the next step when you start your own practice.
2. In an adjacent cell enter the formula `=COUNT(A:A)`. The range
   `A:A` selects the entire column `A`, and `COUNT` will return the
   number of cells containing *numeric* values, so the header row
   containing text will not be counted. If you are skeptical that
   `COUNT` may be including the header cell containing
   'prior_experience', try applying `COUNT` to a smaller list of
   values, some numbers and some text, to confirm it only counts the
   cells with numbers.
   
   ![](pix/survey_analysis-6.png){.screencap}
3. Calculate the percentage as the ratio between number of responses
   for a given value over the total number of responses, e.g. If the
   value for "Total Responses" is in `F1` and the number of `1`
   responses is in `G6`, the formula for the ratio is `=G6/F1`.
4. If you try copying this formula across the next few rows, you will
   see something like this:
   
   ![](pix/survey_analysis-7a.png){.screencap}
   
   If you select different cells in the `H6:H10` range you will see
   that both the numerator cell and denominator cell in your formula
   are changing. We want the numerator to change, it corresponds to
   the response number 1,2,3,4,5 which is in the corresponding
   row. The denominator however should always be the total which is in
   cell `F1`. This is a job for absolute references which we learned
   last week!
5. Update your formula in `H6` to make the denominator an absolute
   reference to cell `F1`: `=G6/$F$1`. Fill this formula across the
   range `H6:H10`.
   
   Discuss with your neighbor: Are both `$` necessary here? What
   happens if you use only one or the other?
   
6. You should now see the correct ratio in each cell. Check the
   formula in individual cells to see how the numerator changes, but
   the denominator remains the same.
   
   ![](pix/survey_analysis-7b.png){.screencap}
   
## Format the Ratio as a Percentage

Finally, we wish to display the proportion as a percentage. This is a
number formatting issue, not an analysis issue, so we don't use a
formula in this case, but the "Format Data" option. This can be found
on the "Home" ribbon in the "Number" pane, or by right-clicking the
cells and selecting "Format Cells...".

1. Select the range of cells containing the proportions
2. Format them as percentages

   ![](pix/survey_analysis-8b.png){.screencap}
