---
title: 'Scatter Plots in MATLAB'
morea_type: module
morea_id: module-matlab-plotting-scatter
ef_type: optional
published: true
---
This is optional additional practice. There is no extra credit associated with completing this work. <!-- {.alert .alert-info} -->

For this module we will conduct some analysis of the grades last
semester's practice midterm and actual midterm. Remember, the primary
purpose of producing a plot of data is to communicate some message
about those data, so we want to explore this grade data and try to
determine a reasonable message that we can communicate with it.

# The Data

Download
[midterm_and_practice_grades.csv](../../data/midterm_and_practice_grades.csv). This
file contains anonymized scores from last semesters practice exam 1
and actual exam 1. You may view the file in Excel if you wish, but in
general do not save the file back as a CSV from Excel. Excel has some
poorly designed features that results in changing how the data in CSV
files are stored in significant but hidden ways.

This is a data file containing 625 records (rows), each record containing 4 values:

1. grade received on practice midterm
2. grade received on actual midterm
3. the time difference between *completing* the practice exam and
   starting the actual midterm in days. Positive values indicate
   practice was taken prior to actual midterm. Note that only 67
   records indicate that the practice exam was completed more than a
   day prior to starting the final exam. This may be a bit misleading
   as many more people completed *most* of the practice prior to
   starting the final, but then went on to complete the practice exam
   after taking the final.
4. Class time code, integer values 1 through 7, 1 indicates the first class session (8:10am), 2 the sectiond, etc. through 7 the last (5:05pm).

## Getting Started

The file [lab09_example.m](lab09_example.m) contains the example code shown here, use it as reference.

Download [lab09_start.m](lab09_start.m). Save it to a location where you are keeping your optional practice files.

## Read the Data

``` 
gradeData = csvread('midterm_and_practice_grades.csv');
```

Unfortunately, MATLAB does not make it easy to referr to different columns of data by name, so it will be convenient if we copy each column to a vector with a descriptive name:

``` matlab
practiceGrades = gradeData(:,1); 
examGrades = gradeData(:,2);
timeDiff = gradeData(:,3);
classTime = gradeData(:,4); % 1 indicates 8:10 sections, 2 9:40, etc.
```

# Exploring the Data

Let's do a little exploring from the command window before we visualize the grade data.

We might be interested in the mean (average) practice score and exam score:

<pre class="env-matlab">
<samp>>> meanPractice = mean(practiceGrades)
meanPractice =
   82.7992
>> meanExam = mean(examGrades)
meanExam =
   86.0960
</samp>
</pre>

This tells us that the average exam grade was a little higher than the
average practice grade. Is this believable? How might we explain this
finding?

We may also be interested in how the mean scores of different groups
of students compare. For example, would we expect there to be a
difference in mean score between people who took the practice exam
before the actual exam, vs. those that took the practice after the
actual exam?

We can define an intermediate logical vector that will select students
who prepared for the exam by taking the practice more than 1 day in
advance of the actual exam:

<pre class="env-matlab">
<samp>>> prepared = timeDiff > 1;
</samp>
</pre>

Notice in the workspace we now have *625x1 logical* vector stored in
'prepared'. There is a `0` in each place in `prepared` corresponding
to elements in `timeDiff` that are less than or equal to 1, and a `1`
in `prepared` corresponding to each element in `timeDiff` that is
greater than 1. We can use this logical vector to select only the
corresponding rows in other vectors. For example, if we wanted to know
the mean of the scores of students who prepared:

<pre class="env-matlab">
<samp>>> meanPrepared = mean(examGrades(prepared))
meanPrepared =
   91.6387
</samp>
</pre>

If we also wanted to find the average score for the group of folks
that completed the practice exams with less than a day before starting the actual exam we could define another variable with the value `timeDiff <= 1`, but it is a bit cleaner to use the logical NOT (`~`) operator instead:

<pre class="env-matlab">
<samp>>> meanUnprepared = mean(examGrades(~prepared))
meanUnprepared =
   85.4194
</samp>
</pre>

Here we read `~prepared` as "not prepared", which is logically equivalent to `timeDiff <= 1`.

Keep in mind: we are making some assumptions by naming the variable
"prepared". The implication is then that people who completed the
practice exam more than a day prior to starting the actual exam were
"prepared" while those that did not (`~prepared`) were not. This is
likely not accurate. There were many ways one could prepare for the
midterm, completing the practice exam was one way, but not the only
way. Also, as previously stated, there were relatively few people that
met the above criteria for `prepared`, many more started the practice
exam before starting the actual exam, but just didn't complete the
practice exam until after completing the actual exam. Perhaps they
started the practice, did a few problems, found they were comfortable
with them, and decided to wait to finish until after taking the actual
exam. Does this make them less "prepared" tan someone finishing all
the practice problems before starting the exam? Not necessarily.

Keep this in mind when interpreting the data, and this idea in mind
when interpreting other data: Sometimes the "best" words we can think
of to name a value can be misleading if understood too literally.

# Plotting Practice Grade vs. Exam Grade

As you know from the pre-lab content, the simplest call to MATLAB's `plot` function takes a vector of 'x' values and a vector of 'y' values, `plot(x,y)`. If we try that we our grade data, however, we do not get pleasing results:

<pre class="env-matlab">
<samp>>> plot(practiceGrades, examGrades)
</samp>
</pre>

![](pix/practice_vs_exam_connected.png) <!-- {.screencap} -->

As you have probably guessed, MATLAB connects data points with a line
by default, but we want to plot our data wit any connecting lines:

<pre class="env-matlab">
<samp>>> plot(practiceGrades, examGrades, '.')
</samp>
</pre>

![](pix/practice_vs_exam_scatter.png) <!-- {.screencap} -->

## Annotating the Plot

Every plot needs at least labeled axis and a descriptive title. The
axis labels are easy because they just need to describe the data on
each axis:

``` matlab
xlabel('Practice Exam Score (%)');
ylabel('Exam Score (%)');
```

![](pix/practice_vs_exam_axis_labels.png) <!-- {.screencap} -->

A good title is difficult to come up with here. We know that "Practice
Exam Score vs. Actual Exam Score" is not a good title because it
simply repeats information already contained in the axis
label. Ideally we would like a title that describes something
interesting about the data, such as "Higher Practice Scores Associated
with Higher Exam Scores", but it is difficult to make a conclusion like
that from what we have plotted.

# Fitting a Linear Model

This was originally a lab activity from last semester. We had introduced some different topics by this time in the semester, including fitting a data to a linear model. This semester we will cover this topic the the next lab. <!-- {.alert .alert-warning} -->

Just as when working with data in spreadsheets, we often would like to
fit some data to a mathematical model that will help us make
conclusions about the data. We will continue fitting linear models of the form 

$$
y = p_{1}x + p_{2}
$$

This can be done in MATLAB using the `polyfit` function:

``` matlab
gradeFit = polyfit(practiceGrades, examGrades, 1);
```

The above example uses `polyfit` to fit the data contained in
`practiceGrades` and `examGrades` to a degree 1 polynomial, in other
words, a straight line. The value returned by `polyfit` is a vector of
coefficients:

<pre class="env-matlab">
<samp>>> gradeFit
gradeFit =
    0.2336   66.7541
</samp>
</pre>

This tells us that `polyfit` determined that the coefficients $[p_{1},
p_{2}]$ are $[0.2336,\quad 66.7541]$. In other words, the model fit by
`polyfit` describes the following relationship between practice grades
and exam grades:

$$
examGrade = 0.2236*practiceGrade + 66.7541
$$

## Plotting the Best Fit Line

Just like we did in Excel, we now want to plot our best fit line that
we found with `polyfit` on our plot. To do this, we first need some
data generated from the model. We will use the model to estimate an
exam grade for different practice grades ranging from 0 to 100. First
we need a vector of practice grades:

``` matlab
predictorPracticeGrades = 0:100;
```

Notice we named the variable `predictorPracticeGrades` to avoid
writing over the variable named `practiceGrades` which contains the
actual practice grades data. `predictorPracticeGrades` only purpose is
to serve as "pretend" practice grades to generate estimated exam
grades using our `gradeFit` model. We can generate exam grades our
model predicts using the `polyval` function:

``` matlab
estimatedExamGrades = polyval(gradeFit, predictorPracticeGrades);
```

Now we have some x (`predictorPracticeGrades`) and y
(`estimatedExamGrades`) data that we can plot as a line to visualize our
model over our data:

``` matlab
hold on
plot(predictorPracticeGrades, estimatedExamGrades, '-')
```

With the addition of the linear best fit line, we can observe that
practice scores appear to be positively correlated with exam scores
and write a descriptive title:

```
title('Practice Scores Correlate with Exam Scores')
```

Now that we have more than one data series on our plot, we need to add
a legend to help the viewer understand what the different data mean:

```
legend('Exam Scores', 'Linear Fit');
```

The labels we pass as arguments to `legend` are in the order that data
series were added. In this case we first plotted the exam scores data,
then we plotted the linear fit model.

![](pix/practice_vs_exam_linear_fit.png) <!-- {.screencap} -->

### Printing the Model to Output

We *could* display the best-fit equation on the plot itself like we
did in Excel, but rather than introduce a new function to write text
on plots (if you would like, refer to the documentation for the `text`
to try this later), we will stick with `fprintf` and display the model
information as printed output in the command window:

```
fprintf('Figure 1: estimatedExamScore = %.2f*practiceExamScore + %.2f\n', gradeFit);
```

# Practice: Fit a Second Linear Model

We might expect the relationship between practice exam scores and
actual exam scores to be different between the group of people who
completed the practice exam before starting the actual exam, and the
group that did not. Repeat the steps above to fit another model called
`gradeFit2` using only data from people who completed the practice
exam at least a day in advance of starting the actual exam:

```
gradeFit2 = polyfit(?, ?, 1); % replace the ?s with appropriate variables
estimatedExamScores2 = polyval(gradeFit2, predictorPracticeGrades);
```

Hint: you can use the `prepared` variable created in the example to
select only practice and exam grades from records for which the
practice exam was completed more than a day before starting the actual
exam.

Plot the new linear fit line on the same plot and update the legend:

```
plot(predictorPracticeGrades, estimatedExamScores2, '-');
legend('Scores', 'Linear Fit 1', 'Linear Fit 2', 'Location', 'southeast');
```

![](pix/practice_vs_exam_2model.png) <!-- {.screencap} -->

Noticed how we added two additional arguments to the `legend` call to
move the legend to the lower right corner where it is less likely to
cover part of the best fit line. View the documentation for `legend`
for more placement options.

# Practice: Plot Preparation Time vs. Exam Grade

The `timeDiff` vector, or column 3 in `gradeData`, contains the time
in days between completing the practice exam and starting the final
exam. Add another section to your practice file to produce a second
plot that plots this value as a independent variable (horizontal axis)
vs. the exam score as a dependent variable (vertical axis).

The final plot should look something like this:

![](pix/preptime_vs_exam_linear_fit.png) <!-- {.screencap} -->

# Saving Figures

If you are asked to include figures as file uploads, or in documents, always save the figure as an image, do not take a screen shot. Saving the figure will generally produce a higher quality image than taking a screen shot. There are two ways to save a MATLAB figure as an image:

- Interactively: from the figure window click "File" and then "Save As...". Choose the destination and file name for your image and click "Save".
- Programmatically: use the `saveas` function in your script. See the
  `lab09_example.m` script for an example of how to do this.
  
If you need to produce an image that is guaranteed to be viewable
exactly the way you save it, choose the 'png' format. If you need to
save an image that can be zoomed in to arbitrary zoom levels, or
modified after the fact (e.g. changing line colors, fonts, etc), save
as 'svg'.
