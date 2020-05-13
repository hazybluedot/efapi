---
title: 'Creating a Bar Chart from Survey Data'
morea_id: spreadsheet-charts-survey-results
morea_type: experience
morea_summary: 'Follow along an example using spreadsheets to chart the results of a survey'
morea_labels:
    - 'New: bar charts'
published: true
---
We wish to visualize the frequency of responses from our lab 3 survey
that we computed in the previous section. Because this is categorical
data (e.g. the data are categorized as "Disagree", "Agree", etc.), it
is appropriate to visualize these results as a bar chart.

As in the analysis section, just watch and ask questions as the TA
demonstrates creating a bar chart for question 1 results, then you
will have a chance to practice using question 2 results.

## Insert the Chart

All visualizations start with some data to be visualizes, so the first
step is to select the data you wish to include in the visualization:

1. We want to visualize the number of responses in each response
   category, so make a selection that includes both the list of
   response categories and the list of numbers of responses in each
   category:
   
   ![](pix/survey_analysis-chart-1.png){.screencap}

2. On the "Insert" tab, select the downward triangle next to the
   bar chart icon and select the "clustered column" bar 2D bar chart
   option.
   
   ![](pix/survey_analysis-chart-2.png){.screencap}
3. Drag the inserted chart so that it lines up nicely with the top of
   the row that "Question 1" is displayed in.
   
## Format the Chart

The automatic formatting gets most of the important information in the chart for us:
- The category names are correctly displayed
- The bar height corresponds to the number of responses in each category
- The y axis contains numbers and tick lines to help see the value of each bar

There are still a few things we need to do before this chart is
suitable for sharing with others:

1. We want to add a descriptive title so that a viewer can understand
   what the hight of the bars means.
2. While not necessary, it would be nice to also include the
   percentage value of each response category above each bar.

### Add a Title

1. Click on the text "Chart Title" on the chart. Type a more
   descriptive title, such as "Students' Prior Experience with
   Excel". Hit `Enter`.
   
### Adding Percentage Values

::: aside Alternative
Other methods for inserting data labels include:
1. From the ribbon select the "Design" tab, then "Add Chart Element" and then "Data Labels"
2. With the chart selected, an icon should appear to the upper right with a green "+" sign. Click that and then "Data Labels".

In general, if you want to change something about a part of a chart a
good place to start is by clicking or right-clicking on the part you
want to modify. The right-click menu will display a short list of
possibilities relevant to the current selection.

Try right-clicking on different parts of the chart to see what options you have for each.
:::

To add additional text associated with each data point on the chart we
want to add *data labels* which are considered a type of *chart
element*. There are several ways to add chart elements, but one of the
easiest to remember is to right click one of the data points, since we
want to add something to each data point. 

1. Select one of the bars. All 5 bars should automatically be selected.
   - if only a single bar is selected, click outside the chart, then the select one of the bars again.
2. Select "Add Data Labels" from the list.
3. By default the data labels contain the number value for each
   bar. This can be helpful sometimes, but we want to show the
   percentage. 
4. Right-click one of the data labels and choose "Format Data Labels" from the list.
5. Under the label options, check "Value from Cells". 

   The "Value from Cells" option does not exist on Excel for Mac. For
   this particular data you can get the same look by changing the Y
   data to come from the percents, rather than the number column. This
   "fix" will not work in all cases. We encourage you to [submit feedback to Microsoft](https://excel.uservoice.com/forums/304933-excel-for-mac/suggestions/17821858-custom-data-labels-for-scatter-and-bubble-graphs){target="_blank"} and vote for this feature to be added. {.os .os-mac}
   
   &nbsp;
6. When prompted for a data label range, select the cells in your
   spreadsheet that contain the percentages for each category.
7. Now un-check the "Value" item from the "Label Options" list and you
   should be left with just the percentages as data labels above each
   bar.
8. To change the position of the data labels, select different options
   under "Label Position". Try some different values to see what works
   best for this chart.
   

