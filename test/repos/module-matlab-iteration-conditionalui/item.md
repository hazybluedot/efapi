---
title: 'Challenge: Add User Interaction'
morea_type: module
morea_id: module-matlab-iteration-conditionalui
published: true
---
<!-- NOTE:
Encourage students to help their neighbors get the first two practices working before they individually work on the challenge.
-->

The two previous programs you finished each processed files in a folder, but each had different behaviors:

| Program              | On Invalid Data      | Iterative Print        | Summary Print              |
|----------------------|----------------------|------------------------|----------------------------|
| lab12_repl_[netid]   | error and terminate  | distance for each file |                            |
| lab12_sponge_[netid] | warning and continue |                        | total accumulated distance |


For these challenges, create a new script named "lab12_ui_[netid].m",
you will incorporate elements of both previous programs and
conditional statements to control behavior depending on user input.

| Program          | On Invalid Data             | Iterative Print             | Summary Print              |
|------------------|-----------------------------|-----------------------------|----------------------------|
| lab12_ui_[netid] | *conditioned on user input* | *conditioned on user input* | total accumulated distance |


# Challenge 1

At the start of the program, before processing any data, use the
`input` function to prompt the user for an action to take if the
program encounters invalid data.

<samp class="env-matlab">
</samp>

# Challenge 2

At the start of the program, before processing any data, use the
`input` function to prompt the user to determine whether or not to
print incremental distances for each file.

## Sample Run: Skip on Invalid, Don't Report Distance for each File

<samp class="env-matlab">
Behavior when encountering invalid data: Enter 1 to skip, 2 to exit: <kbd>1</kbd>
Report distance for each file? [true|false]: <kbd>false</kbd>
<span class="warning-text">Warning: InvalidTimeData.csv: Time must be increasing 
> In <span class="function-name">lab12_practice3</span> (<span class="line-ref">line 42</span>) 
Warning: <span class="function-name">JustAccData.csv</span>: Invalid data file. Expecting 7 columns 
> In lab12_practice3 (<span class="line-ref">line 28</span>) 
Warning: <span class="function-name">midterm_and_practice_grades.csv</span>: Invalid data file. Expecting 7 columns 
> In lab12_practice3 (<span class="line-ref">line 28</span>)</span>
Total distance traveled is 16502.2m
</samp>

## Sample Run: Exit on Invalid, Don't Report Distance for each File

<samp class="env-matlab">
Behavior when encountering invalid data: Enter 1 to skip, 2 to exit: <kbd>2</kbd>
Report distance for each file? [true|false]: <kbd>false</kbd>
<span class="error-text">Error using <span class="function-name">lab12_practice3</span> (<span class="line-ref">line 40</span>)
InvalidTimeData.csv: Time must be increasing</span>
</samp>

## Sample Run: Skip on Invalid, Report Distance for each File
<samp class="env-matlab">
Behavior when encountering invalid data: Enter 1 to skip, 2 to exit: <kbd>1</kbd>
Report distance for each file? [true|false]: <kbd>true</kbd>
EveningCommute_2019_10_30.csv: Distance traveled is 0.0m
EveningCommute_2019_11_04.csv: Distance traveled is 674.0m
EveningCommute_2019_11_06.csv: Distance traveled is 2594.9m
EveningCommute_2019_11_11.csv: Distance traveled is 0.0m
<span class="warning-text">Warning: InvalidTimeData.csv: Time must be increasing 
> In <span class="function-name">lab12_practice3</span> (<span class="line-ref">line 42</span>) 
Warning: JustAccData.csv: Invalid data file. Expecting 7 columns 
> In <span class="function-name">lab12_practice3</span> (<span class="line-ref">line 28</span>)</span>
MorningCommute_2019_10_31.csv: Distance traveled is 1170.7m
MorningCommute_2019_11_01.csv: Distance traveled is 543.6m
MorningCommute_2019_11_04.csv: Distance traveled is 2817.2m
MorningCommute_2019_11_05.csv: Distance traveled is 522.1m
MorningCommute_2019_11_06.csv: Distance traveled is 2249.8m
MorningCommute_2019_11_07.csv: Distance traveled is 2374.0m
MorningCommute_2019_11_08.csv: Distance traveled is 3195.0m
MorningCommute_2019_11_14.csv: Distance traveled is 253.8m
MorningCommute_2019_11_15.csv: Distance traveled is 7.2m
<span class="warning-text">Warning: midterm_and_practice_grades.csv: Invalid data file. Expecting 7 columns 
> In lab12_practice3 (<span class="line-ref">line 28</span>) </span>
Total distance traveled is 16402.2m
</samp>

## Sample Run: Exit on Invalid, Report Distance for each File

<samp class="env-matlab">
Behavior when encountering invalid data: Enter 1 to skip, 2 to exit: <kbd>2</kbd>
Report distance for each file? [true|false]: <kbd>true</kbd>
EveningCommute_2019_10_30.csv: Distance traveled is 0.0m
EveningCommute_2019_11_04.csv: Distance traveled is 674.0m
EveningCommute_2019_11_06.csv: Distance traveled is 2594.9m
EveningCommute_2019_11_11.csv: Distance traveled is 0.0m
<span class="error-text">Error using <span class="function-name">lab12_practice3</span> (<span class="line-ref">line 40</span>)
InvalidTimeData.csv: Time must be increasing</span>
</samp>
