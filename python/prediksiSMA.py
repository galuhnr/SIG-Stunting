#!/usr/bin/python

DB_NAME = "gisfuzzy"
DB_USER = "postgres"
DB_PASS = "postgres"

from turtle import left
import psycopg2
import pandas as pd
import numpy as np

#tersambung ke database postgresql
conn = psycopg2.connect(dbname=DB_NAME, user=DB_USER, password=DB_PASS)
cur = conn.cursor()

#data kabupaten kota dan tahun
cur.execute("SELECT kabkota_id, tahun_id FROM pelayanan_kesehatan order by kabkota_id, tahun_id asc")
dt_kab = np.array(cur.fetchall())
df = pd.DataFrame(dt_kab, columns=['kabkota_id','tahun_id'])

#faktor pelayanan kesehatan
cur.execute("SELECT kabkota_id, tahun_id, jml_balita, jml_balita_sehat, (CAST(jml_balita_sehat AS FLOAT) / CAST(jml_balita AS FLOAT))*100 as persentase_pelayanan FROM pelayanan_kesehatan order by kabkota_id, tahun_id asc;")
dt_pelayanan = np.array(cur.fetchall())
df_pelayanan = pd.DataFrame(dt_pelayanan, columns=["kabkota_id","tahun_id","jml_balita","jml_balita_sehat","persentase_pelayanan"])

#faktor sanitasi layak
cur.execute("SELECT kabkota_id, tahun_id, jml_kk, jml_akses_jamban, (CAST(jml_akses_jamban AS FLOAT) / CAST(jml_kk AS FLOAT))*100 as persentase_sanitasi FROM sanitasi_jamban order by kabkota_id, tahun_id asc;")
dt_sanitasi = np.array(cur.fetchall())
df_sanitasi = pd.DataFrame(dt_sanitasi, columns=["kabkota_id","tahun_id","jml_kk","jml_akses_jamban","persentase_sanitasi"])

#faktor desa UCI
cur.execute("SELECT desa_uci.kabkota_id, desa_uci.tahun_id, (CAST(desa_uci.jml_desa_uci AS FLOAT) / CAST(kabupaten_kota.jml_desa AS FLOAT))*100 as persentase_desauci from desa_uci join kabupaten_kota on desa_uci.kabkota_id = kabupaten_kota.id_kab order by desa_uci.kabkota_id, desa_uci.tahun_id asc;")
dt_desa = np.array(cur.fetchall())
df_desa = pd.DataFrame(dt_desa, columns=["kabkota_id","tahun_id","persentase_desauci"])

#faktor asi eksklusif
cur.execute("SELECT kabkota_id, tahun_id, (CAST(jml_diberi_asi AS FLOAT) / CAST(jml_bayi AS FLOAT))*100 as persentase_asi FROM asi_eksklusif order by kabkota_id, tahun_id asc;")
dt_asi = np.array(cur.fetchall())
df_asi = pd.DataFrame(dt_asi, columns=["kabkota_id","tahun_id","persentase_asi"])

#faktor stunting
cur.execute("SELECT kabkota_id, tahun_id, CAST(persentase AS FLOAT) as persentase_stunting FROM stunting order by kabkota_id, tahun_id asc;")
dt_stunting = np.array(cur.fetchall())
df_stunting = pd.DataFrame(dt_stunting, columns=["kabkota_id","tahun_id","persentase_stunting"])

#simple moving average periode 3 tahun
df_pelayanan = df_pelayanan.groupby('kabkota_id',as_index=False)['persentase_pelayanan'].rolling(window=3,closed='left').mean()
df['pelayanan_kesehatan'] = df_pelayanan.loc[:,"persentase_pelayanan"]
print(df)

# df_sanitasi = df_sanitasi.groupby('kabkota_id',as_index=False)['persentase_sanitasi'].rolling(window=3).mean()
# df['sanitasi'] = df_sanitasi.loc[:,"persentase_sanitasi"]

# df_desa = df_desa.groupby('kabkota_id',as_index=False)['persentase_desauci'].rolling(window=3).mean()
# df['desa_uci'] = df_desa.loc[:,"persentase_desauci"]

# df_asi = df_asi.groupby('kabkota_id',as_index=False)['persentase_asi'].rolling(window=3).mean()
# df['asi_eksklusif'] = df_asi.loc[:,"persentase_asi"]

# df_stunting = df_stunting.groupby('kabkota_id',as_index=False)['persentase_stunting'].rolling(window=3).mean()
# df['stunting'] = df_stunting.loc[:,"persentase_stunting"]



