---
title: 'Convert Bearing and Speed vs. Time to Position vs. Time'
morea_id: spreadsheet-data-bearings-to-pos
morea_type: experience
published: true
---
Switch to the "Lazy Dog's Walk" sheet in your start file. Work through
the exercises in this section on that worksheet.

## Lazy Dog's Recorded Data

|              |             |
| ------:      | ----------- |
| Run Time:    | 182 seconds |
| Pace Length: | 3 ft        |


| Path | Distance | Bearing        |
| --:  | :-:      | :-:            |
|      | (paces)  | (deg CCW of E) |
| out  | 42       | 25             |
| out  | 48       | 95             |
| out  | 65       | 130            |
| back | 56       | 210            |
| back | 70       | 280            |
| back | 26       | 342            |
| back | 16       | 330            |


## Convert Bearing and Time to Position

We want to plot Lazy Dog's position at different points in time, but
Lazy Dog recorded just his time walking and bearing after each
turn. We can convert these values to position data in three steps:

1.  Type, or paste the values for "Run Time" and "Pace Length" into
    cells `B1` and `B2`, respectively.
1.  Copy and paste Lazy Dog's data into the appropriate cells. Use
    "Paste Special" (right-click) to paste values only, preserving the
    formatting of the existing cells.
2.  Create a formula to convert the distances in paces data to
    distance in ft. in the appropriate column.
3.  Create formulas to calculate values for each path walked:\
    X change (ft), and Y change (ft) as in previous lab.
    (ignore the blue columns for now)
5.  Use the `SUM` function to find total distance, total X change, and total Y change
    (cells `D16`, `E16`, `F16`)
6.  Calculate net distance (magnitude) and direction (angle) in the
    orange cells.
7.  Based on his run time, calculate Lazy Dog's average speed and
    average velocity.
8.  How fast is his speed in mph?

### Check your Work

Compare your results with these:

values
:  ![](pix/lazydog_walk-values.png) <!-- {.screencap} -->

formulas
:  ![](pix/lazydog_walk-formulas.png) <!-- {.screencap} -->
