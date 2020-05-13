---
title: 'Data Analysis'
published: true
morea_id: spreadsheet-numeric-analysis
morea_type: experience
---
<section class="callout">
<h1>Quick Reference</h1>

We will work with three new functions in this lab designed to answer questions about lists of data:
- `MAX` will return the maximum value in found in a list of data.
- `MATCH` will return the position (index) in a list were a particular value is found. 
- `INDEX` will return the value in a list at a particular position, or
index. e.g. what is the value in the list at index 3?
</section>

Spreadsheet software has many helpful tools for analyzing data. For
instance, if you wanted to find the maximum value, you could scroll
through the list and find it manually, but with longer lists, the
chance of error increases.  Let the computer do the work!

To make things a little easier, assign names to lists
(e.g. `time_list`, `pos_list`, `vel_list`)

- Remember to only include numbers in the list 
- Shortcut: From A2, use ctrl-shift-down arrow (Mac users:
command-shift-down arrow) to highlight numbers as far as list goes  

Create a "Summary Table" to display results. Type "Results" in the first
cell for you column header.

Type "max velocity" below the column header. Create a formula in the
next column to find the maximum velocity. `=MAX(vel_list)`

To find the time at which the maximum velocity occurs, use the INDEX
function. Create a new formula in the next row.

  - The first piece of information is where the answer will come from
    `time_list`. `=INDEX(time_list, ...)`
  - Next we use the `MATCH` function to tell it what to match your answer
    with. In this case, we want to find the maximum velocity (our first
    Result) in the `vel_list`. `=INDEX(time_list, MATCH(B2,vel_list, ...))`
  - The last piece of information is how closely we want those values to
    match (1 means less than, -1 means greater than, 0 means exact
    match)
  - We want ours to match exactly so our final formula should be
    `=INDEX(time_list, MATCH(B2,vel_list, 0))`

What if we wanted to look up a specific value, for instance the
position at time 5.5 seconds? This can be done by first finding the
position of `5.5` in the time vector, and then getting the value from
the corresponding position from the position vector.

Create a formula in the next row to find the position value at time 5.5.
  
1. Use `MATCH` to find the index of 3.5 in `time_list`. How does
   `MATCH` handle values that do not exist in the list?
   {.detaillevel .detaillevel-2}
	 
2. Use the `INDEX` function to retrieve the value from the position
   vector at the index returned by the `MATCH` {.detaillevel .detaillevel-2}

	The first piece of information is the name of the position vector:
	`=INDEX(pos_list,` {.detaillevel .detaillevel-3}

Take a quick glance at your graphs to see if your numbers make
sense. How much do you trust the result for the position at 3.5
seconds? What is the velocity doing between 3 and 4 seconds?

Check your results and formulas here:\
![](pix/results.png)\
![](pix/results_formula.png)
