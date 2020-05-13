---
title: 'Making Sense When MATLAB Can''t Make Sense'
morea_type: module
morea_id: module-matlab-error-comprehension
published: true
---
You will be modifying your program from lab 9 for this activity, make sure it is complete and working as expected. Save two *new* copies as
`lab10_{{netid}}_errors1.m` and `lab10_{{netid}}_errors2.m` in your `EF105/Lab10` folder.

# Phase 1: Break Things

1. Each person spend a minute or two breaking the plotting program you wrote. Break it in one of two ways:
   - By introducing an error so that the program fails to run completely
   - By introducing a change that does not generate an error, but produces undesirable results
   - Try changing things both by changing individual lines, or
     re-ordering lines. Observe what changes introduce errors, what
     changes result in different results, and what changes do not make
     any visible difference in how the program runs.
   - At the top of the program as part of the documentation comment, briefly describe what about the program doesn't work from a user's perspective. Do not refer to line numbers or code, just explain how the output of the program is not what you expect.  
2. Submit your broken programs to the team dropbox for your section: @[link](dropbox/Lab10t)


# Phase 2: Fix things

After most people in your section have had a chance to upload two
broken programs to the team dropbox, identify 2-4 programs that are
not your own (1-2 above your entries and 1-2 below) and download them
to your `EF105/Lab10` folder.

1. For each of the broken programs you download, read the description
   of what is not working that the author included, and run the broken
   program to observe the results. Note whether an error is generated
   or not. If no error is generated, note how the output of the
   program differs from what is expected.
2. Take a moment to look over your neighbor's broken code, try to
   figure out how it is broken. Try to correct the program so that it
   runs without error and produces the expected output. If this fixes
   the problem, you're done, if it doesn't try repeating this process
   until you can explain to them how to fix the program.
4. Annotate the copy of your neighbor's program to indicate what you
   fixed. Use comments to describe specifically what was broken.
   - If the program produced an error, describe the type of error and *why* it produced an error. 
   - If the program did not produce an error but undesirable results, describe what was different about the results and *why* the results were different. 
   - For your descriptions of why: think in terms of how MATLAB
     evaluates each line in order, can only access variables that
     already exist in the workspace, and attempts to evaluate exactly
     what it sees.
5. Submit these fixed and annotated file to your own individual dropbox for this lab.
