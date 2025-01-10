import re
import sys

# Fonction de vérification de la force du mot de passe
def check_password_strength(password):
    strength = 0  # Initialisation de la force
    inlist=''
    # Vérification de la longueur du mot de passe
    if len(password) < 8:
        strength += 1
    elif len(password) >= 8 and len(password) < 12:
        strength += 3
    else : strength +=4


    # Vérification des types de caractères (chiffres, lettres, symboles)
    types = 0
    if re.search("[a-z]", password):  # Lettres minuscules
        types += 1
    if re.search("[A-Z]", password):  # Lettres majuscules
        types += 1
    if re.search("[0-9]", password):  # Chiffres
        types += 1
    if re.search("[!@#$%^&*(),.?\":{}|<>]", password):  # Symboles
        types += 1

    # Ajout de la force en fonction du nombre de types
    if types == 1:
        strength += 1
    elif types == 2:
        strength += 2
    elif types == 3:
        strength += 3
    else : strength += 4

    # Vérification si le mot de passe est dans la liste des mots de passe connus
    known_passwords_file = 'listepass.txt'  
    with open(known_passwords_file, 'r') as file:
        known_passwords = file.read().splitlines()

    if password in known_passwords:
        strength += 0
        inlist ="==>le mot de passe est parmi les 100k connus"
    else:
        strength += 2


    # Retourner la force du mot de passe
    if strength == 10:
        return f" {strength}/10 : Le mot de passe est trop securise."
    elif (strength >= 6 and strength < 8 ) :
        return f" {strength}/10 : Le mot de passe est acceptable."
    elif (strength >= 8 and strength < 10 ) :
        return f" {strength}/10 : Le mot de passe est fort ."
    else:
        return f" {strength}/10 : Le mot de passe n'est pas securise. {inlist}"


if __name__ == "__main__":
    password = sys.argv[1]
    print(check_password_strength(password))
