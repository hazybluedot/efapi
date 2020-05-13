---
title: 'Programming Patterns: Read, Execute, Print'
morea_type: module
morea_id: module-matlab-program-structure-rep
published: true
---
An important aspect of all engineering design is the structuring of
complex designs in terms of relatively simple, well-defined building
blocks. By first understanding smaller building blocks it becomes
possible to build more complex structures, which then become building
blocks for still larger structures. In general, this method of
*abstraction* is crucial for engineers to practice. Many real-world
final designs are too complex for our minds to process all the details
at once, we depend on abstraction to allow ourselves to ignore details
at lower layers of abstraction and concentrate on the details of
higher-level layers.

# Read, Execute, Print

One common programming pattern is the "read, execute, print" pattern:

1. First read some data, this could be coming from another program, a
   file, the internet, a human user, etc. Note that typically we will
   use "read" to mean data being read from *outside* the program, but
   not data that are initialized in the program itself.
2. Perform some calculation *on the data that were read in*. We call
   this step "execute" in the sense that the computer is asked to
   execute, or complete some commands on the data.
3. Finally, we need some way to get the results of the calculation or
   execution back out to the world. Again, the recipient could be
   another program, a log file, or a human user. We call this phase
   "print" but it doesn't mean the results are printed on physical
   media, e.g. `fprintf` is a way to print results to a file, or the
   command window.

## Example 1

In the MATLAB editor, you can create sections of code by beginning a
line with the double percent (`%%`) symbol. Because it starts with a
percept, MATLAB treats it as a comment and not as code. It is a way
for you to organize your code in a way that makes it easier for humans
to understand. For example:

``` matlab
%% Read

theta = input('Enter an angle in degrees: ');
distance = input('Enter a distance in feet: ');

%% Execute

x = distance*cos(deg2rad(theta));
y = distance*sin(deg2rad(theta));

%% Print

fprintf('The x component is %.1f and the y component is %.1f\n', x, y);

```

This example defines 'Read', 'Execute', and 'Print' sections. Notice how when you move your cursor to a section, that section is highlighted. MATLAB makes it easy to run just a single section of code with the "Run Section" button on the "Editor" tab, or by pressing <kbd>Ctrl</kbd>+<kbd>Enter</kbd>.

![Screenshot of the "Run Command" button on the EDITOR tab of the MATLAB user interface](pix/run_section_annotated.png) <!-- .screencap -->

This can be very useful for running small chunks of a larger program
when testing and debugging.

## Practice: Identify Read, Execute, and Print

Consider the finished program from last lab:

``` octave
theta = input("Enter a launch angle in radians: ");

x0 = 5.5;
y0 = 3.4;
x = 21;
v0 = 80.2;
g = -9.8; 
y = y0 + tan(theta)*(x - x0) + (g/(2*v0^2))*(1 + tan(theta)^2)*(x - x0)^2;

fprintf("The resulting y coordinate is %.1f m\n", y);
```

1. Using named sections like in the above example, identify three sections in the trajectory equation program:
   1. Read (`%% Read`)
   2. Execute (`%% Execute`)
   3. Print (`%% Print`)
2. Compare your sections with a neighbor, discuss any differences. If
   you have a disagreement, great! Disagreements are a great
   opportunity to develop a deeper understanding of a topic. Share the
   disagreement with the class. Can a consensus be reached?
3. Are there any lines of code that did not fall into one of the three categories? Hint: there should be, review how each of the sections are described above.

You may have to rearrange the above program a bit so that each of the
three sections contain **only** lines that are relevant to the
respective section. Make sure the final rearrangement still works when
run as a whole program. Also experiment with running each section
using <kbd>Ctrl</kbd>+<kbd>Enter</kbd>.
