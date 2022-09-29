import psycopg2

def bulkInsert(records):
    try:
        connection = psycopg2.connect(dbname="gisfuzzy",user="postgres",password="postgres")
        cursor = connection.cursor()
        sql_insert_query = """ INSERT INTO hasil (id, tahun, kab_kota, defuzzifikasi, tingkat_risiko) 
                           VALUES (%s,%s,%s,%s,%s) """

        # executemany() to insert multiple rows
        result = cursor.executemany(sql_insert_query, records)
        connection.commit()
        print(cursor.rowcount, "Record inserted successfully into mobile table")

    except (Exception, psycopg2.Error) as error:
        print("Failed inserting record into mobile table {}".format(error))

    finally:
        # closing database connection.
        if connection:
            cursor.close()
            connection.close()
            print("PostgreSQL connection is closed")

records_to_insert = [[1,2017,'Pacitan',2.098, 'rendah'], [2,2017,'Pacitan',2.098, 'rendah'],[3,2017,'Pacitan',2.098, 'rendah']]
bulkInsert(records_to_insert)