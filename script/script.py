from faker import Faker

# Créer une instance de Faker
fake = Faker()

# Ouvrir le fichier SQL
with open('update_script.sql', 'w') as f:
    # Générer 4500 instructions UPDATE
    for i in range(1, 4501):
        # Créer l'instruction UPDATE
        sql = f"UPDATE site_production SET ID_Production = {i} WHERE ID_Site = {i};\n"
        # Écrire l'instruction dans le fichier
        f.write(sql)