---
title: Summary
morea_type: module
morea_id: lab04-summary
published: true
---
# Summary

Today we practiced the following skills:

- Create a scatter plot by selecting columns of data
- Add, remove, and modify chart elements such as
  - Chart title
  - Axis titles
  - Legend
- Manage a chart's data series to
  - Select or de-select individual data series
  - Add/remove data series
- Adjust the size of a chart to a precise size using "Format Chart Area"

# Graded Items

- [Quiz: Excel Plotting MC]({{wwwroot}}/sys.php?f=assess/main&name=quiz04mc)
- [Dropbox: Lab04]({{wwwroot}}/sys.php?f=dropbox/main&pid=Lab04)

    Upload your `lab04_{{netid}}` file. It should have three worksheets in the following order:
	1. "cart_incline"
       - Include appropriately annotated position, velocity, and acceleration charts
	2. "cart_flat"
        - Include appropriately annotated position, velocity, and acceleration charts
        - Include charts of Phase 1 position data and Phase 2 position data with a linear trendline fit on each.
		- Include a formula that calculates the average velocity for
          Phase 1 and Phase 2. Name these cells
          <kbd>phase1_velocity</kbd> and <kbd>phase2_velocity</kbd>,
          respectively.
	3. "Lazy Dog's Walk"
       - Include a X-Y chart with position data plotted and the
         background of the plot area set to the
         [estabrook.jpg](pix/estabrook.jpg) image.
       
-  [Feedback: Excel Practice and Plotting]({{wwwroot}}/feedback/excel2.php)

<!-- :break section -->
# Plotting Tips

- Whenever we ask for "appropriately annotated" charts, what we are looking for is:
  - Clear and descriptive axis titles, including units.
  - A clear and descriptive chart title.
  - When trendlines are included, the equation and R^2^ value should also be included, unless otherwise noted.
  - When there are multiple dataseries on a single chart, a legend with descriptive names for each data series. (We did not produce any finished plots with multiple dataseries today, so none of the plots you made should have legends)
  
- Follow the adage "less is more". Think about what the
  main point you wish to communicate with your visualization and
  remove any visual elements that do not aid in communicating that message.
- Choose descriptive and succinct titles for your chart and axes. Your
  title should describe *what* the data represents, not simply repeat
  information already contained on the axis labels. e.g. "Position
  vs. Time" is not a good chart title as this information should
  already be included in the axis titles.
- Avoid any effects that produce a "3D" style, such as any of the 3D
  chart types, or "Shadow" effects. Effects such as these make it
  difficult to interpret the data and are generally not suitable for
  technical data visualizations.

::: aside Useless Features 
You may ask, "why does excel let me create
3D effects if I should not use them" or related "Microsoft wouldn't
include features that weren't useful, so if there's a button/option
for it, it must be because it's a good feature to use, right?"

There are a couple answers to this question:
1. Microsoft did not design the Office suite, including Excel, with
technical data visualization in mind. The Office suite of tools was
originally designed around the needs of business users, not
Engineers. 
2. Microsoft and other traditional software companies typically make
   money by selling new versions of their software. Once software
   works "well enough", it is difficult to justify asking for money
   for a new version of software that does all the same things the old
   software does. Adding more features, even if they are not useful,
   is an "easy" way for companies to argue that the new software has
   changed and is therefore worth spending money to replace.  :::
:::

# Resources

- [Excel Tutorials](#collapse-excel-tutorials) <!-- {data-toggle="collapse" .collapsed} -->
  - http://www.baycongroup.com/el0.htm
  - http://office.microsoft.com/en-us/training/CR061831141033.aspx
  - http://www.gcflearnfree.org/Tutorials/
  - http://www.learnthat.com/
  - http://www.karbosguide.com/
  <!-- {ul:.collapse #collapse-excel-tutorials} -->

- LibreOffice Calc ([Download](https://www.libreoffice.org/download/download/))
  - https://libreofficehelp.com/libreoffice-calc-tutorials/
  - https://help.libreoffice.org/Calc/Instructions_for_Using_Calc
  - https://www.youtube.com/watch?v=HcpaIuOLCqo
