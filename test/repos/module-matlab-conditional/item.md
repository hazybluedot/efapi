---
title: 'MATLAB Conditional Statements'
morea_type: module
morea_id: module-matlab-conditional
published: true
---
The programs we have been writing so far have a rather simple
execution path: each line in the file is evaluated by MATLAB exactly
once, from top to bottom, every time the program is run. We can use
conditional statements to perform *input data validation*, that is, we
can check for expected properties of the user-supplied data file as
soon as the file is loaded, and display an error if the data is not
what is expected.

# Example: Input File must have 7 columns

If you experimented with `uigetfile` in the previous section, you will
have discovered that the user could easily select a CSV file
containing data that this program is not written to handle. For
example, the user may select the grade data file,

<samp class="env-matlab">
>> lab11_example2
Reading data from midterm_and_practice_grades.csv
<span class="error-text">Index in position 2 exceeds array bounds (must not exceed 4).

</span>
<span class="error-text">Error in <span class="function-name">lab11_example2</span> (<span class="line-ref">line 10</span>)
pos = data(:,5:7);</span></samp>


We can use the `size` function to retrieve both the number of rows and number of columns from a matrix.

```
[nRow, nCol] = size(data);
```

We can write an expression that evaluates to `true` if the number of
columns is not equal to 7: `nCol ~= 7`, where `~=` is read as "is not
equal to". This expression evaluates to either true or false, so we
can use it as the expression of an `if` conditional statement:

~~~ aside A More Streamline Approach
The usage of an `if` expression here, while descriptive of what we would like to express, is a bit of an academic example because MATLAB has a shortcut function, `assert`, that implements this pattern for us:

```
assert(nCol == 7, 'Invalid input. File must contain 7 columns.');
```
~~~

``` matlab
if expression
    statements % evaluated if expression evaluates to true
end

% remainder of program behaves as usual.
```

The *expression* in this case is `nCol ~= 7`, "if the number of
columns is not equal to 7". If this condition is met, we wish to
evaluate a single statement, `error(msg)` where `msg` is a descriptive
message to help the user understand why their selected file caused an
error.

```
if (nCol ~= 7)
    error('Invalid input. File must contain 7 columns.');
end
```

The results of this modification can be inspected and tested in
[lab11_example3.m](lab11_example3.m).

## Sample Run

Now, if you run the program and choose a CSV file that does not have 7
columns, the sample run should look something like:

<samp class="env-matlab">
>> lab11_example3
<span class="error-text">Error using <span class="function-name">lab11_example3</span> (<span class="line-ref">line 9</span>)
Invalid data file. Expecting 7 columns.</span>
</samp>

The line number may differ, but the error message should be exact, we
will be testing this value.

You may use "JustAccData.csv", or "midterm_and_practice_grades.csv" to
test this result. Both contain fewer than 7 columns of data.

# Practice: Time Must be Increasing

Check the difference between adjacent time values are
[`all`](https://www.mathworks.com/help/matlab/ref/all.html)
positive. If
[`any`](https://www.mathworks.com/help/matlab/ref/any.html) are not
positive, display the error message 'Time must be increasing' and
terminate the program.

Use the BadTimeData.csv file to test your implementation.

## Sample Run

<samp class="env-matlab">
>> lab11_practice1
<span class="error-text">Error using <span class="function-name">lab11_practice1</span> (<span class="line-ref">line 19</span>)
Time must be increasing.</span>
</samp>

# Challenge: Mean Acceleration is Expected to be Close to Zero

Since the acceleration data is measured from a real object with a
limited energy source (i.e., Dr. Maczka), we would expect the mean
acceleration over the course of data collection to be close to zero
(why? Discuss.). Determine an appropriate bound away from zero and
issue a `warning`, not an `error`, if the data loaded contains
acceleration data with a mean outside of this bound.

Use the "BadAccData.csv" file to test your implementation.

## Sample Run

<samp class="env-matlab">
>> lab11_practice1
<span class="warning-text">Warning: Possible bias in acceleration data. 
> In <span class="function-name">lab11_practice1</span> (<span class="line-ref">line 23</span>)</span>

</samp>

# Challenge: Speed Must Be Reasonable

The speed is the magnitude of the velocity vector. What is a
reasonable upper bound on the speed data that we might check for?
Implement a check for this and issue a warning of the speed in the
supplied data ever exceeds the upper bound.

Create your own test data file to test your implementation.

# Challenge: Include File Name in Error or Warning

In all warnings and error messages, include the name of the file that
caused the error/warning. In error messages, include the file name as
the first part of the message and use a colon to separate the rest of
the message. In warnings, include the file name as part of the message
sentence as shown in the sample run.

## Sample Run

<samp class="env-matlab">
>> lab11_practice1
<span class="error-text">Error using <span class="function-name">lab11_practice1</span> (<span class="line-ref">line 19</span>)
BadTimeData.csv: Time must be increasing</span>

</samp>

<samp class="env-matlab">
>> lab11_practice1
<span class="warning-text">Warning: Possible bias in acceleration data found in BadAccData.csv. 
> In <span class="function-name">lab11_practice1</span> (<span class="line-ref">line 23</span>)</span>

</samp>

# Command Reference

all

: return true if all elements of a logical array are true

any

: return logical true if any elements in a logical array are true, otherwise return false.

error

: print an error message and terminate the program

size

: retrieve the number of rows and columns of a matrix

uigetfile

: prompt the user to select a file, name of file is returned

warning

: print a warning message and continue evaluating the rest of the program.


