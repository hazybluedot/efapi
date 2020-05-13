---
title: 'Iterate Over Each File in Folder'
morea_type: module
morea_id: module-matlab-iteration-intro
published: true
---
<!-- NOTE: Intent
The goal of this section is to help students get the data downloaded into the appropriate location (`../data` relative to their Lab12 folder), and demo using a for-loop to iterate over a list of files.
-->

Last week we worked on a program that performed some analysis on the
data in a file supplied by the user. This week, we are going to extend
that idea by creating a program that will perform some analysis on
*all* the files in a folder.

# Unzip the Data Archive

Download the [MixedCommuteData.zip](../../data/MixedCommuteData.zip) archive. This contains
the files used in Lab 11, plus some additional. Instead of unzipping
to your "Lab12" folder, unzip to your "EF105" folder, and rename the
unzipped folder "data". 

# List All CSV Files in a Folder

The `dir` function will return a list of files in a directory. We use
the `fullfile` function to construct a path that referrs to all csv
files in a folder named 'data' one level above the one the script is
run from.

``` matlab
fileList = dir(fullfile('..', 'data', '*.csv'));
```

# Iterate Over a List of Files

Recall from the pre-lab content that MATLAB's syntax to iterate over a
list of files (or a list of strings in general) is unfortunately
obtuse.

``` matlab
for file = {fileList.name}
    fileName = file{1};

    % do something with fileName
    
end
```

In the code above, `fileName` will take on the value of each file in
the list. Unfortunately, `fileName` will containg *only* the file
name, not the full path to the file. Use `fullfile('..', 'data',
fileList)` to generate the full path that can be passed as input to
`csvread`.

<!-- NOTE: Demo Debug Mode
Use the example code to do a brief demo of debug mode to step through lines in a for-loop. Depening on feedback in your section, consider doing a short demo iterating over a regular numeric vector, and then over the list of strings. Be sure to show and remind students how to get *out* of debug mode.
-->
