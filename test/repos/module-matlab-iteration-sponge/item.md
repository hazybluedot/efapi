---
title: 'Accumulate Results, Print Output After Last Iteration'
morea_type: module
morea_id: module-matlab-iteration-sponge
published: true
---
Copy your "lab12_repl_[netid].m" to a new script file called
"lab12_sponge_[netid].m". 

# Practice: Accumulate Distance Across Files

Modify the file to follow a sponge pattern:

``` matlab
for file = {fileList.name}
    fileName = file{1};
    %% Read
    
    %% Execute
        
end

%% Print
```

Instead of printing out the distance calculated for each file,
accumulate each distance into a `totalDistance` variable.

<div class="matlab-example" data-file="lab12_example_accumulation.m"></div>

## Test Your Code

Run the updated program and observe its behavior. Is this desirable?

<!-- NOTE:
Students will make the following changes to their working lab12_repl file to transform it to lab12_sponge:

1. Remove the print section and associated code from the body of the loop
2. Add an accumulator variable (named totalDistance) to the code
3. Add a print block after the 'end' of the for-loop and print out the accumulated value.
-->

<!-- ERROR:
When introduce this, include a brief explaination about why the 'error' behavior is not ideal: Since we are only printing out a summary, any bad file will cause the program to exit before printing out any results. If we skip over invalid data, we still want to alert the user that something may not be right, so we use 'warning' instead of 'error'.
-->

# Practice: Continuing on Bad Files

Instead of generating an error and terminating execution of the
program when it encounters a data file it cannot understand, let's
print out a warning, ignore that particular file, but continue
processing the remaining files in the list.

1. Change all calls to `error` in the body of the loop to `warning`
   instead. 
2. Immediately after the call to `warning`, before the `end` of the
   `if` block, call `continue`. When MATLAB encounters `continue` in
   the body of a loop, it skips over remaining statements in that
   iteration and begins the next iteration. For example:
   ``` matlab
   if (nCols ~= 7)
       warning('%s: Invalid data file. Expecting 7 columns', fileName);
       continue;
   end
   ```
   
   <div class="matlab-example" data-file="lab12_example_forcontinue.m"></div>
3. Run your program again. Observe the difference.
   
## Sample Output

<samp class="env-matlab">
<span class="warning-text">Warning: InvalidTimeData.csv: Time must be increasing 
> In <span class="function-name">lab12_practice2</span> (<span class="line-ref">line 25</span>) 
Warning: JustAccData.csv: Invalid data file. Expecting 7 columns 
> In <span class="function-name">lab12_practice2</span> (<span class="line-ref">line 16</span>) 
Warning: midterm_and_practice_grades.csv: Invalid data file. Expecting 7 columns 
> In <span class="function-name">lab12_practice2</span> (<span class="line-ref">line 16</span>)</span>
Total distance traveled is 16402.2m
</samp>

The value printed may be different from the example above. Check your value with your neighbors. Try to explain any differences you observe.
