---
title: 'Create a Script File'
morea_type: module
morea_id: module-matlab-script-files
published: true
---
While MATLAB *can* be used as a fancy calculator, if that's all we
used it for then we might as well just use our calculator! One of the
primary ways MATLAB, and other programming environments, differ from a
calculator is the design to write programs that can be stored and run
at different points in time, with different data each time.

When we talk about the *user*, we are referring to the person running
a program. In many cases, especially when you are programming to
support your own work, you are the primary user of your program.

## Create a Script File

So far we have been working in the command window which is a good
place to work for an interactive experience. It is not a good place to
work if you are trying to write out a more complex program as it just
runs one statement at a time. 

### Open the Start File

1. From the "Home" tab, select the "Open" icon.
2. Select the start file you downloaded earlier and named `lab07_{{netid}}.m`
3. Click "Open"

A new window should appear above the command window. This new window
is the "Editor". As the name implies, this is where you will edit a
script file (or "m-file") that can be run, saved, and submitted as a
dropbox file.

### Add some Statements

The start file should contain some text that starts with the `%`
character at the top. Text that starts with `%` is called a "comment"
and is ignored by MATLAB. It is used to communicate to readers of the
program (often you) to aid in understanding what the program does. 

1. In the space provided, enter your own name as the "Author"
2. Copy and paste the lines corresponding to the trajectory equation from the
   command window into your script file.
   - Do not paste in the prompt `>>`!
   - End each line with a semicolon (`;`) to suppress any automatic output.
   
Your script should look something like this:

``` matlab
% A short script to practice variable assignment and math operators
% Author: Lazy Dog (enter your own name here!)

clear; % start with an empty workspace

theta = deg2rad(25);
x0 = 5.5;
y0 = 3.4;
v0 = 80.2;
g = -9.81;
x = 21;
y = y0 + tan(theta)*(x - x0) + (g/(2*v0^2))*(1 + tan(theta)^2)*(x - x0)^2;
```

::: box A Comment about Comments 
There are several lines in the above
code example that begin with the '%' symbol. MATLAB uses this symbol
to denote a *comment*, any text starting with '%' until the end of the
line is ignored by the MATLAB interpreter. Comments are used to add human explanations to code. If the very first comment of a file, such as the one above, is treated as an overall description of what the script file does.
:::

### Save your File

Before MATLAB can run your program, you need to save it. Because you
already named your startfile to `lab07_{{netid}}.m` you do not need to
worry about the file name this time, but in general there are some
restrictions on what you can name your file:

- A script file name *must* be a [valid MATLAB variable name](https://www.mathworks.com/help/matlab/matlab_prog/variable-names.html).
  - No spaces
  - Must start with a letter
  - Can contain *only* letters, digits, or underscore

::: box Common Naming Errors 
One of the most common errors we see when
saving files is due to downloading multiple copies of a file. When a
file already exists in your downloads folder that contains the same
name as the one you are downloading, your browser will usually append
a number in parentheses like `(1)` to the file name to create
`lab07_start(1).m`. This is an invalid file name and MATLAB will not
be able to run it the way you expect.
:::

## Run your Program

You can run the program in the command window by typing in the name of
your script file and pressing <kbd>Enter</kbd>.

<pre class="env-matlab">
<samp>
>> lab07_{{netid}}
>>
</samp>
</pre>

If you suppressed all automatic output with semicolons then you won't
see any output on the command window: your program will run and when
it finishes (in a fraction of a second) you get a blank command window
prompt `>>` waiting for another command. You can confirm that your
program did in fact run by viewing the values in the Workspace.

::: box Common Misconception
It is common to try running a program like the one we just wrote that does not produce any output, and then think that it did not work. Remember, not all programs will produce visible output on the command window. Look at the workspace to determine if a program that you ran changed something.
:::

::: box Common Confusing Behavior 
When running a script file, MATLAB's
current path must be the folder that the script file is saved in. If
you open a script file from a location other than your current path
MATLAB will prompt you to either "Change Folder" or "Add to Path". You
should *always* select "Change Folder".

- This will become slightly more challenging when we begin working with data files. As the path to data files will be relative to the current folder, so you will need to take care where your data files are stored relative to your data files. We will revisit this point in a future lab.
:::

## Computational Thinking

You may have heard the phrase "[computational
thinking](https://en.wikipedia.org/wiki/Computational_thinking)" in
relation to engineering. It is a skill that many professionals say is
important for engineers to develop. One aspect of computation thinking
is being able to systematically think through a sequence of
instructions, and imagine or predict what happens at each step. You
can practice this with your MATLAB script files or using the command
window and check your predictions by watching the workspace.

Each time MATLAB evaluates an expression, it will update the
workspace. We say that the *state* of the workspace consists of all
the named variables and their defined values at any given time. Thus,
each time MATLAB evaluates an expression the state of the workspace
changes.  You can see this as it happens when you evaluate expressions
from the command line, but it is harder to see when evaluating a
script file since MATLAB evaluates each line very quickly one after
the other.

It is extremely helpful to practice predicting what the state of the
workspace will be before any given line in a script file as this will
aid in understanding how a program works, and also help quickly
solving errors when they occur. A number of the quiz problems are
designed to help you develop this skill.

## Play and Discuss

1. Try changing the assigned values in your script file, then save the changes.
2. Run the program again and observe corresponding changes in values
   displayed in the Workspace.
3. Try to break your code in a small way and pay attention to the
   error message that is produced when you run it. Recognizing common
   patterns of error messages will become very important for catching
   and fixing common errors that we all make.
