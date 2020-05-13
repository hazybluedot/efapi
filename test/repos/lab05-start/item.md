---
title: Introduction
morea_type: module
morea_id: lab05-start
published: true
---
## Announcements

Don't forget Lab 4 Graded Items:
- [Quiz: Excel Plotting MC]({{wwwroot}}/sys.php?f=assess/main&name=quiz04mc)
- [Dropbox: Lab04]({{wwwroot}}/sys.php?f=dropbox/main&pid=Lab04)
	
File grades will not be posted until all have been graded.
	
Exam 1 is in two weeks:
- Thursday sections: February 20
- Tuesday sections: February 25

The exam will assess material covered in the spreadsheet labs (labs
3-6). It will take place during your regular class time and will
consist of work similar in scope that you have been practicing in the
labs.

### A Note About Class Time

Remember that as a 1 credit course there is an expectation
that you will spend about 1 and a half hours outside of class
time practicing skills and working with the material. You may
not finish all the parts of a lab in class, and that is OK,
finish it up later in the week. If you *do* finish all the
material for a lab in class, consider spending an hour and a
half practicing skills by making slight modifications to past
labs. This practice will pay off when it comes to taking the
exams!

<!-- NOTE:
Remind students that as a 1 credit
course, there is an expectation that they will work ~1 outside
of class with the material.
- The goal of the TA in the Lab is not cover every part of the lab in detail, but to provide students with the skills and confidence to complete the remaining portion outside of class.
-->

::: section Objectives
The obectives of this lab are to
  - learn how to calculate estimations of derivatives and integrals in a spreadsheet environment.
  - learn three new spreadsheet functions for data analysis.
  - practice creating charts and formatting chart elements.
:::

::: section Getting Started
- Create a folder named <kbd>Lab05</kbd> in your `EF105` folder on your H-drive
- Create a new Excel workbook and save it as
<kbd>lab05_{{netid}}.xlsx</kbd> in the `EF105/Lab05` folder on your
H-drive.

### Import the Data

- Open the `cart_incline.csv` file from your `EF105/data` folder. Copy
  the worksheet over to your `lab05_{{netid}}` workbook. Review [Move
  a Worksheet Between
  Workbooks]({{wwwroot}}/modules/excel2/#module-spreadsheet-move-worksheet)
  if needed.
- Delete the first row of data containing "Run #1" 
- Delete the "Date and Time" column. Column A should become "Time
(s)".
- Delete the "Force (N)" column and all columns to the right of it.

### Name Your Columns

Just like naming indivudal cells, you can name ranges of cells. Just
select the range and enter a name into the name box. Name columns A,
B, C, and D <kbd>time</kbd>, <kbd>pos</kbd>, <kbd>vel</kbd>, and
<kbd>acc</kbd> respectively. We will use these names to create more
readable formulas.

:::
