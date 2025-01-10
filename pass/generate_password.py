import random
import string

def generate_strong_password(length=12):
    # Génère un mot de passe fort
    while True:
        characters = string.ascii_letters + string.digits + string.punctuation
        password = ''.join(random.choice(characters) for i in range(length))
        
        # Vérifier que le mot de passe contient des lettres majuscules, minuscules, des chiffres et au plus 2 symboles
        if (any(c.islower() for c in password) and
            any(c.isupper() for c in password) and
            any(c.isdigit() for c in password) and
            sum(1 for c in password if c in string.punctuation) <= 2):
            return password

if __name__ == "__main__":
    print(generate_strong_password())  # Affiche le mot de passe généré
