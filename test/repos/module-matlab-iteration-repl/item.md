---
title: 'Print Output on Each Iteration'
morea_type: module
morea_id: module-matlab-iteration-repl
published: true
---
<!-- NOTE:
The new math implementation here is calculating the distance from a 3D position vector. Use the example to focus in on this step. Remind students to mentally block out the rest of the code to just focus on how to calculate the distance. Once they are comfortable with the math, *then* they can copy the relevant code back into their practice file in the 'Execute' section.
-->

Download the [lab12_start.m](lab12_start.m) file, save it to your "Lab12" folder and rename it to "lab12_repl_[netid].m", replacing "[netid]" with your NetID.

In addition to the necessary lines to read a list of files from a directory named "data" in a folder one level up from your current folder, this start file contains a template for the REPL pattern:

``` matlab
for file = {fileList.name}
    fileName = file{1};
    %% Read
    
    %% Execute
        
    %% Print
end
```

# Practice: Fill In Read, Execute, and Print

Select the appropriate lines from your lab11 program and copy them
into your lab12_repl_[netid].m file. This is an exercise in code
comprehension, so make sure you read each line carefully and
understand what it does before deciding whether or not it is needed in
lab12_repl_[netid].m before copying it over.

## Read

Most of the code from your previous read section will carry over:

1. Read CSV data from a file
2. Check that the data has exactly 7 columns, print an error message and terminate if it does not.
3. Separate out a time, acceleration, and position vector from the data.
4. Check that time is always increasing, print an error message and terminate if it is not.
5. Any additional checks for valid data you wish to do.
6. Filter out any NaN values from position data.
7. There is no need to separate out the 'x', 'y', and 'z' components of acceleration and position at this time.

<!-- NOTE:
Strictly speaking, we do not need to extract acceleration data from the matrix since the current plan does not use it. It doesn't hurt to keep it part of the data indexing chunk though.
-->

## Execute

Calculate the total distance traveled from the position data.
<div class="matlab-example" data-file="lab12_example_3D_distance.m"></div>

## Print
   
Print the name of the file and the total distance traveled, for
example, a sample output line might look like:
   
<samp class="env-matlab">
EveningCommute_2019_11_04.csv: Distance traveled is 649.2m
</samp>

<div class="matlab-example" data-file="lab12_example_fprintf.m"></div>

# Test Your Program
   
Run your code, you should see output similar to this:

## Sample Output

<samp class="env-matlab">
EveningCommute_2019_10_30.csv: Distance traveled is 0.0m
EveningCommute_2019_11_04.csv: Distance traveled is 674.0m
EveningCommute_2019_11_06.csv: Distance traveled is 2594.9m
EveningCommute_2019_11_11.csv: Distance traveled is 0.0m
<span class="error-text">Error using <span class="function-name">lab12_practice1</span> (<span class="line-ref">line 23</span>)
Time must be increasing</span>
</samp>

Your numbers may be different than the example above. Compare with
your neighbors.

# Practice: Add File Name to Error Message

Now that the program is iterating over a list of file names, the
simple error message "Time must be increasing." Is not as helpful as
it was when the user was selecting just a single file. We should also
include the name of the file that is causeing the error in the
message, this will allow the person running the code to take action,
whether that be removing the offending file, or fixing it.

<div class="matlab-example" data-file="lab12_example_error_msg.m"></div>

## Sample Output

<samp class="env-matlab">
EveningCommute_2019_10_30.csv: Distance traveled is 0.0m
EveningCommute_2019_11_04.csv: Distance traveled is 674.0m
EveningCommute_2019_11_06.csv: Distance traveled is 2594.9m
EveningCommute_2019_11_11.csv: Distance traveled is 0.0m
<span class="error-text">Error using <span class="function-name">lab12_practice1</span> (<span class="line-ref">line 23</span>)
InvalidTimeData.csv: Time must be increasing</span>
</samp>

This is better, now when the user sees the error, they have enough
information to track down the offending file.
