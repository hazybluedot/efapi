---
title: Summary
morea_id: lab07-summary
morea_type: module
published: true
---
## Summary

- MATLAB IDE Overview
  - use the command window to test out small snippets of code, interact with a running program
    - code entered into the command window is not saved
  - use the editor to write longer programs and save programs to be run in the future or shared. When we talk about "script files" these are files that are opened and saved from the editor and generally have a `.m` file extension.
  - use the workspace to view the current state of variables and their values that any program will have access to
- MATLAB Syntax
  - Mathematical operations such as `-, +, *, /`, trig functions such as `tan, sin, cos`
    - The standard trig functions work with radians. Use the 'd'
      version, `sind`, `acosd`, etc. when working with degrees, OR use
      `deg2rad` and `rad2deg` to convert values between degrees and
      radians.
  - Assign a value to a variable
  - Behavior of the trailing semicolon.
  - Building up complex expressions by combining multiple operators and functions
- Computational Thinking
  - The practiced skill of thinking through a problem in a systematic
    way, similar to how a computer would. This is a useful skill even
    when not writing any actual code, but is particularly valuable
    when writing and debugging code, so start practicing early!
  - values must be defined before they can be used, this is similar to establishing the "given" part of a general engineering problem
- Commenting:
  - comments can be *helpful* when they provide contextual understanding to a statement of code.
  - They can be *redundant* when the simply are a literal description of what a statement does.
  - They are *necessary* when using literal numbers in code to avoid confusing *magic numbers*

## Common Errors

- Forgetting to explicitly multiply. Just like spreadsheets, MATLAB
  does not follow general mathematical conventions of assuming
  multiplication. So while we understand $tan(\theta)(x-x_{0})$ to
  mean "tangent of theta times (x - x0)" but in MATLAB
  `tan(theta)(x-x0)` will generate an error. To evaluate that as a
  mathematical expression it must be written `tan(theta)*(x-x0)`.
- Attempting to use a variable before it has been declared:

  ``` matlab
  clear
  x = y + 1;
  y = 2;
  ```
  
  will result in an error because `y` is not defined when the line is
  evaluated. Remember, MATLAB evaluates lines from top to bottom, so
  even though `y` is defined later, the error will still occur.

- Saving script files with invalid names. Remember, script files
  follow the same naming rules as variables, just letters, numbers and
  the underscore character are allowed. The most common ways this rule is broken
  is when downloading multiple copies of a start file and your browser
  sames them as e.g. `lab07_start(1).m`.  The `()` characters in the
  file name will result in MATLAB not being able to run the file as
  expected.
  - You can easily re-name files from within MATLAB using the "Current Folder" panel.
  
## Graded Items
- [Dropbox: First MATLAB Script File]({{wwwroot}}/sys.php?f=dropbox/main&pid=Lab07)
  Your program should:
  - initialize all required parameters to calculate the final vertical position of a projectile
  - correctly calculate the final vertical position 
  
- [Quiz: MATLAB Foundational Concepts]({{wwwroot}}/sys.php?f=assess/main&name=quiz07)
- [Feedback: MATLAB Foundations]({{wwwroot}}/feedback/matlab-basics.php)

## Before Next Class

There is pre-lab content that you are expected to work through before
next class and a pre-lab quiz to help assess your understanding of the
pre-lab content, topics will be:

- Commenting (if we did not have time to discuss in class)
- User input and output
- Vectors and Matrices

Not all pre-lab content is ready yet, but will be before the
weekend. We will post an annoucement when it is ready. <!-- {.alert
.alert-warning} -->

Remeber: we expect you to work through the content *before* comming to
class. Because of the EF website limitation we can only have one due
date and so it is set to the end of the day next Tuesday so that both
Thursday and Tuesday sections have the same access to a final reminder
about the content the day it was due. If you do not work through the
material and ask questions *before* coming to class you may have a
difficult time following along with the material for that day. We
don't want that to happen, so get started on the pre-lab content
early!
