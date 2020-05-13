---
title: 'Commenting Fundamentals'
morea_type: module
morea_id: module-matlab-commenting-fundamentals
published: true
---
We have already seen that the '%' character denotes a comment in
MATLAB: text that the interpreter ignores. While MATLAB ignores
comments and they do not affect the behavior of the program, they are
intended to aid a human reader in understanding a program, so comments
may be "helpful", "unhelpful" or "redundant". Sometimes, comments may even be
*necessary* for the correct interpretation of the results of a program.

# Projectile Motion: Trajectory

Let's review our projectile motion script and add some helpful comments:

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

1. The only comment we currently have is the once at the top of the
   file. Previously we mentioned that if the very first line of a file
   begins with a comment it is intended to be an overall description
   of what the script does. The current comment is not very helpful: a
   person looking at this program for the first time would not get a
   clear understanding of what to expect when running the program.
   Here's a more helpful comment:
   
   ``` matlab
   % calculate the final vertical position of a 
   % projectile using the ideal trajectory equation.
   ```
   
   It is ok and encouraged to split a long comment into multiple lines
   like this. MATLAB may does this automatically for you as you type
   your comment, or you can press <kbd>Ctrl</kbd>+<kbd>J</kbd> to ask
   it to wrap an existing long comment.
   
2. The first statement of the program already has a comment:

   ``` matlab
   clear; % start with an empty workspace
   ```
   Is this a helpful or unhelpful comment? From what we have seen so far we can conclude it is helpful, but it is important to keep in mind "helpful" can be subjection. Because we only recently learned what the `clear` command does, it is helpful to be reminded. But soon we will have seen and used `clear` enough that we will have memorized its simple definition. Further more, for any built-in function in MATLAB we can always quickly look up help:
   
   <pre class="env-matlab">
   <samp>>>help clear
   </samp>
   </pre>
   
   For the time being, this comment is helpful, but in the future as
   we gain more skill it will not be as helpful.
   
3. The remaining lines are not commented. We'll demonstrate how to
   write a helpful comment for the first, then you can practice
   writing comments for the rest.
   
   Let's first talk about unhelpful comments:
   
   ``` matlab
   theta = deg2rad(25); % assign the value produced by deg2rad(25) to theta
   ```
   
   This is not helpful and is in fact *redundant*: We know (or will
   soon have memorized) that the `=` operator is the "assignment"
   operator, and it always works to *assign* the value from the
   expression on the right to a variable name on the left. This
   comment is simply re-iterating the definition of the assignment
   operator. It also does not provide any contextual understanding of
   this line in relationship to the program as a whole, so it is not
   helpful.
   
   A more helpful comment would be:
   
   ``` matlab
   theta = deg2rad(25); % Launch angle (degrees)
   ```
   
   In this case, we would say this comment is not only helpful, but
   *necessary*: a human reader needs to know what `theta` is and the
   meaning of the value stored in it to understand the rest of the
   program. From the opening comment, we know that this program is
   intended to calculate the vertical position of a projectile. From
   our contextual understanding of projectile motion we know that a
   projectile has a "launch angle", so this comment helps connect our
   understanding of the problem to a specific variable name, it tells
   the reader that the variable named `theta` will be used to
   represent the "launch angle" of the projectile. Notice we also
   include units in the comment, since the values we assign to
   variables are unitless from MATLAB's point of view.
   
   We do not need to add a description of what `deg2rad` to the
   comment, because a reader can always use the built-in help to
   quickly recall what that function does:
   
   <pre class="env-matlab">
   <samp>>>help clear
   </samp>
   </pre>
   
3. Spend some time now or after class adding helpful comments to each of the remaining lines.
4. The last line of the program is a bit of a special case, so we will briefly discuss it here:
   
   ``` matlab
   y = y0 + tan(theta)*(x - x0) + (g/(2*v0^2))*(1 + tan(theta)^2)*(x - x0)^2;
   ```
   
   Two things make this a bit different from lines we've commented so
   far:
   - It is quite long, for this reason we will add a comment on the line before:
     ``` matlab
	 % solve for the vertical position using the projectile motion trajectory equation
	 y = y0 + tan(theta)*(x - x0) + (g/(2*v0^2))*(1 + tan(theta)^2)*(x - x0)^2;
	 ```
   - and it is a fairly complex expression that encodes a known
     mathematical relationship: the projectile motion trajectory
     equation. In cases like this, it is helpful to include a link to
     a reference for the equation:
	 
	 ``` matlab
	 % solve for the vertical position using the projectile motion trajectory equation
	 % https://efcms.engr.utk.edu/ef151-2020-01/sys.php?f=bolt/bolt-main&c=class-1-8&p=trajectory
	 y = y0 + tan(theta)*(x - x0) + (g/(2*v0^2))*(1 + tan(theta)^2)*(x - x0)^2;
	 ```
     Including a reference link like this is helpful to readers, including your future-self so you can quickly find more information about where a particular equation came from. It can also be used to review the implementation of the equation for correctness.

# Magic Numbers and Necessary Comments

Comments are *necessary* whenever you use a literal number, e.g. `42`, or `9.81`
	
``` matlab
% the answer to the ultimate question of life, the universe, and everything 
% https://tinyurl.com/yytnlfhf
theAnswer = 42; 
```

``` matlab
g = 9.81; % acceleration due to gravity (m/s^2)
```
	
When literal numbers are included in code and are not commented we
call them *[magic
numbers](https://en.wikipedia.org/wiki/Magic_number_(programming))*,
meaning we don't know where they come from or what their significance
is. We want to avoid the use of magic numbers in our programs because
they make them difficult to understand.

# Summary

Helpful Comments

: Help the reader understand the *purpose* of the program and the
  *contextual meaning* of a statement.

  ``` matlab
  v0 = 80.2; % launch speed (m/s)
  ```
  
  When implementing complex mathematical calculations, provide a
  reference link for more information about the equation or
  calculation.
  
Unhelpful or Redundant Comments

: Do not add any information that the reader already knew by looking
  at the code, or could easily look up using the `help` command:

  ``` matlab
  v0 = 80.2; % assign 80.2 to v0
  ```
  This is redundant because the assignment operator `=` is a basic MATLAB operator that we will soon have memorized, and unhelpful because it does not tell us what the meaning of the value `80.2` is.
  
- Wrap long comments to multiple lines by pressing <kbd>Ctrl</kbd>+</kbd>J</kbd>.

# Comments in Code Snippets in the Learning Material

When introducing new concepts or syntax we will often include comments
to explain what is going on. For example, next lab we will be introduing arrays in MATLAB and so we might show some code like this:

``` matlab
x = [3 5 2]; % assign a vector of three elements to x
```

by our descriptions above, this looks like a redundant or unhelpful
comment, are we not holding ourselves to the same standards we ask of
you? No! In the context of a real program this comment would be
redundant and unhelpful, but for the purposes of a code snippets meant
to demonstrate a new idea or syntax without the context of a real
problem, it is helpful to use comments in this way.
