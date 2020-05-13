---
title: 'Understanding Likert Data'
published: true
morea_id: understanding-data-likert-responses
morea_type: reading
---
``` facilitator-guide
This section is intended as a reference for students who are reviewing material. Do not feel compelled to read through this section in class, but do paraphrase the key points

- It is important to think of the numbers we get from a survey or questionair a little differently than other numbers we have been working with: integer values, in most cases it is not meaningul to use arithmetic operations on these results.
- Talk about these constraints as you are demoing the analysis and visualization.
```

Not all data that look like numbers are meant to be understood as
numbers. One common example of numeric data with non-numeric meaning
is data collected from a survey question such as "Indicate your level
of agreement to the following statements..." with response selections
that look like:

| Strongly Disagree | Disagree | Undecided | Agree | Strongly Agree |
| :-:               | :-:      | :-:       | :-:   | :-:            |
| (1)               | (2)      | (3)       | (4)   | (5)            |


This is an example of a [Likert scale] response, and these kinds of
questions may be found at several parts of the engineering design
process, e.g.:

1. Research and early product development, e.g. "I often wish a tool existed that made task X easier"
2. Product prototyping and refinement, e.g. "I found the prototype intuitive to use"
3. Product evaluation and refinement, e.g. "Using this tool made completing task X easier"

Data from a survey such as this might look like

| ID      | Question 1 | Question 2 |
|:--------|------------|------------|
| 1       | 3          | 5          |
| 2       | 1          | 5          |
| 3       | 4          | 3          |
| 4       | 3          | 2          |
| &#8942; | &#8942;    | &#8942;    |


Where each row of data corresponds to an individual person's response,
and each column the responses to each question. In some cases, like in
the example above, there may be additional columns such as an
identifier that is used to link a person's responses to contact
information, or to other survey results, e.g. if the same people are
surveyed multiple times during the design process.

[Likert scale]: https://www.simplypsychology.org/likert-scale.html

## Considerations 

::: aside Pro Tip
Likert scale data is a kind of [ordinal](https://en.wikipedia.org/wiki/Ordinal_data) categorical data. This means that a finite number of ranked values, e.g. "Strongly Disagree", "Disagree", etc. are assigned numbers to identify different categories, where the ordering is meaningful. Interestingly, there is some debate about whether or not it is technically appropriate to calculate statistics such as the mean, or average from Likert scales. According to the definition of ordinal data, it is [not appropriate to take the mean](https://www.mymarketresearchmethods.com/types-of-data-nominal-ordinal-interval-ratio/), but the reality is that most people do, and make meaningful inferences from it. 
:::

Likert scale data is a little different from other data we have worked with so far.

1. Values are constrained to a small number of integers, e.g. 1,2,3,4,
   and 5
2. Magnitude and relative magnitude of the values has no meaning,
   e.g. even though 4 is twice the value of 2 it does not make sense
   that someone who responds "Agree" to a question agrees twice as
   much as someone who responds "Disagree". Similarly:
   
   > “The average of ‘fair’ and ‘good’ is not ‘fair‐and‐a‐half’; which
   > is true even when one assigns integers to represent ‘fair’ and
   > ‘good’!” – Susan Jamieson paraphrasing Kuzon Jr et al. [(Jamieson,
   > 2004)](https://utk-almaprimo.hosted.exlibrisgroup.com/permalink/f/1meb42d/TN_wj10.1111/j.1365-2929.2004.02012)
   
3. However, order *can* have meaning. It makes sense to say that
   someone with a response of "5" agrees "more" than someone who
   responded with a "4".
4. Statistical analysis may result in fractions, for example even
   though individual responses can be 1,2,3,4, or 5, taking the
   average of all responses to a survey may result in a non-integer
   value such as `4.2`
   
## Common Analysis

1. Frequency of responses, e.g. out of all the responses how many
   people answered `1`, how many answered `2`, etc.
2. Finding the mode, or most frequent response.

2. Mean responses, e.g. what was the average response for Question 1?
3. Comparing means across groups, e.g. does the average level of
   agreement on Question 1 differ between 8:10am sections and 5:10pm
   sections? 
