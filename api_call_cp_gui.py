from tkinter import *
from tkinter import ttk
import requests
import json

root = Tk()
root.title("Obtener lista de códigos postales")
root.geometry("400x400")

def consultar_CP():
    url = "http://localhost/www/php_api/api_cp_mysql.php?cp=" + textBox_CodigoPostal.get()
    response = requests.get(url)
    combobox_Colonias.delete(0, "end")
    combobox_Colonias["values"] = response.json()["data"]

    combobox_Colonias.current(0)
    combobox_Colonias.config(state="readonly")

etiqueta_CodigoPostal = Label(root, text="Código postal")
etiqueta_CodigoPostal.place(x=10, y=10)

textBox_CodigoPostal = Entry(root, width=10)
textBox_CodigoPostal.place(x=100, y=10)

button_Consultar = Button(root, text="Consultar colonias", command=consultar_CP)
button_Consultar.place(x=10, y=50)

etiqueta_Colonias = Label(root, text="Colonias")
etiqueta_Colonias.place(x=10, y=80)

combobox_Colonias = ttk.Combobox(root, width=30)
combobox_Colonias.place(x=10, y=100)


mainloop()