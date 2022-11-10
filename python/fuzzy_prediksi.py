#!/usr/bin/python

DB_NAME = "gisfuzzy"
DB_USER = "postgres"
DB_PASS = "postgres"

import psycopg2
import pandas as pd
import numpy as np

#tersambung ke database postgresql
conn = psycopg2.connect(dbname=DB_NAME, user=DB_USER, password=DB_PASS)
cur = conn.cursor()

exec(open("../python/prediksi_row.py").read())
exec(open("../python/inferensi_fuzzy.py").read())

datas = []

for i in range(len(arr_pelayanan)):
  tipping.input['pelayanan'] = arr_pelayanan[i]
  tipping.input['sanitasi'] = arr_sanitasi[i]
  tipping.input['desa'] = arr_desa[i]
  tipping.input['asi'] = arr_asi[i]
  tipping.input['stunting'] = arr_stunting[i]
  tipping.compute()
  deff = np.around(tipping.output['risiko'],4)
  datas.append(deff)

hasil = pd.DataFrame({'defuzzification':datas})
# hasil = pd.DataFrame({'pelayanan_kesehatan': arr_pelayanan,'sanitasi_jamban': arr_sanitasi,'desa_imunisasi': arr_desa,'asi_eksklusif':arr_asi,'stunting':arr_stunting,'defuzzification':datas})
# print(hasil)

for ind, row in hasil.iterrows():
    hasil.loc[hasil['defuzzification'] < 1.5, 'tingkat_risiko'] = 'Rendah' 
    hasil.loc[(hasil['defuzzification'] >= 1.5) & (hasil['defuzzification'] < 2.5) , 'tingkat_risiko'] = 'Sedang' 
    hasil.loc[hasil['defuzzification'] >= 2.5 , 'tingkat_risiko'] = 'Tinggi' 

cur.execute("SELECT tb_tahun.id_tahun, kabupaten_kota.id_kab from tb_tahun, kabupaten_kota where tb_tahun.id_tahun = 6 order by kabupaten_kota.id_kab asc;")
datakab = cur.fetchall()
df_kab = pd.DataFrame(datakab, columns=["tahun_id", "kabkota_id"])

#untuk id ditabel hasil
df_id = pd.DataFrame()
df_id['id'] = np.arange(76, 76 + len(datakab)) + 1

data_new = pd.concat([df_id,df_kab,hasil], axis=1)
#print(data_new)

data_sql=data_new.to_numpy()

def bulkInsert(records):
    try:
        sql_insert_query = """ INSERT INTO prediksi_risiko (id_prediksi, tahun_id, kabkota_id, defuzzifikasi, tingkat_risiko) 
                           VALUES (%s,%s,%s,%s,%s) """

        # executemany() to insert multiple rows
        result = cur.executemany(sql_insert_query, records)
        conn.commit()
        print(cur.rowcount, "Record inserted successfully into prediksi table")

    except (Exception, psycopg2.Error) as error:
        print("Failed inserting record into prediksi table {}".format(error))

    finally:
        # closing database connection.
        if conn:
            cur.close()
            conn.close()
            print("PostgreSQL connection is closed")

bulkInsert(data_sql)