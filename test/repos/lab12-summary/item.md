---
title: Summary
morea_id: lab12-summary
morea_type: module
published: true
---
# Discussion

Notice the error introduced in successive applications of numeric
integration and differentiation when working with realistic (noisy)
data. Given this, can you think back to the previous lab in which we
compared two methods of fitting data to a model: Model 1 using polyfit
on position data, and Model 2 using the velocity, position, and
acceleration data from the cart.

![Model Comparison]({{wwwroot}}/modules/matlab-model-fit/pix/cart_pos_model.png) <!-- {.screencap} -->

In light of what we have learned, and our knowledge that the cart is
calculating velocity and position through numeric integration, what
might explain some of the difference between these two models?

# Graded Items
- @[link](dropbox/Lab12)
  - Upload your completed "lab12_acc_{{netid}}.m" file and "lab12_pos_{{netid}}.m" file.
  - For full credit, your programs should:
	- Run without errors.
	- Correctly use `cumtrapz` and `diff` to numerically integrate and
      differentiate data.
	- Produce appropriately annotated plots similar to the examples.
	- Appropriate level of commenting
	  - include a "doc comment" as the very first comment that briefly describes what the program does.
	  - include comments on lines that make calculations to describe what those calculations mean *in the context of the data*
- @[link](feedback/matlab-numerical)
	
