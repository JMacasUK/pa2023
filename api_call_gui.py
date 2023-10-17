from tkinter import *
import requests


def sumar():
    url = 'http://localhost/www/php_api/api.php?x=' + textBox0.get() + '&y=' + textBox1.get()
    response = requests.get(url)
    etiqueta2.config(text=response.json()['data'])

root = Tk()
root.title("Calculator")

root.geometry("400x400")

etiqueta0 = Label(root, text="Numero 1")
etiqueta0.place(x=10, y=10)

etiqueta1 = Label(root, text="Numero 2")
etiqueta1.place(x=10, y=30)

textBox0 = Entry(root, width=10)
textBox0.place(x=100, y=10)

textBox1 = Entry(root, width=10)
textBox1.place(x=100, y=30)

button1 = Button(root, text="Sumar", command=sumar)
button1.place(x=10, y=50)

etiqueta2 = Label(root, text="Resultado")
etiqueta2.place(x=10, y=80)

root.mainloop()