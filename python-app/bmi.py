height = float(input("Please enter your height(cm): "))
weight = float(input("Please enter your weight(kg): "))
height = height / 100

bmi = weight / (height * height)

print("Your BMI: "+str(bmi))