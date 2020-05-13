---
title: 'Lab 3 Survey Results Data'
published: true
morea_id: data-survey-results-lab03
morea_type: experience
---
``` facilitator-guide
This section asks students to move a worksheet from one workbook to another. I know Clint talked about this in lab 03, but if you didn't be sure to go slow and show your steps since it isn't something that we explicitly did in the last lab.
```

1. Download the [lab03_survey_results](../../data/lab03_survey_results.csv) CSV file. 
2. Open or import it in Excel
3. Copy the sheet containing the survey data into your `lab04-[netid]` file. From the survey results file:
   1. Right-click on the sheet name ("lab03_survey_results").
   2. Select "Move or Copy...".
   3. Select your `lab04-[netid]` file in the "To book:" dropdown.
   4. Keep "Lazy Dog's Distance" selected under "Before sheet".
   5. Click "OK".
3. Switch to your `lab04-[netid]` file, you will do the remaining work
   in this file.

## Understand the Data

The data contain three columns:

- prior_experience: responses to question 1 of the survey
- pace: responses to question 2 of the survey
- lab_time: lab meeting time of the respondent

Each row of data is a response from a single person. The possible
response values are integers between 1 and 5 for both questions, but
the number has a different meaning for each:

### Question 1

| Response | Meaning     |
|---------:|:------------|
|        1 | None        |
|        2 | Very little |
|        3 | Average     |
|        4 | A lot       |
|        5 | Expert      |

### Question 2

| Response | Meaning       |
|---------:|:--------------|
|        1 | Way too slow  |
|        2 | A little slow |
|        3 | OK            |
|        4 | A little fast |
|        5 | Way too fast  |
