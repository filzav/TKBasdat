PGDMP                     
    t            postgres    9.5.1    9.5.1 ?    	           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            	           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            	            2615    26346 	   siasisten    SCHEMA        CREATE SCHEMA siasisten;
    DROP SCHEMA siasisten;
             postgres    false            d           1247    26347    id    DOMAIN        CREATE DOMAIN id AS integer;
    DROP DOMAIN siasisten.id;
    	   siasisten       postgres    false    9            �            1259    26378    dosen    TABLE     M  CREATE TABLE dosen (
    nip character varying(20) NOT NULL,
    nama character varying(100) NOT NULL,
    username character varying(30) NOT NULL,
    password character varying(20) NOT NULL,
    email character varying(100) NOT NULL,
    universitas character varying(100) NOT NULL,
    fakultas character varying(100) NOT NULL
);
    DROP TABLE siasisten.dosen;
    	   siasisten         postgres    false    9            �            1259    26416    dosen_kelas_mk    TABLE     c   CREATE TABLE dosen_kelas_mk (
    nip character varying(20) NOT NULL,
    idkelasmk id NOT NULL
);
 %   DROP TABLE siasisten.dosen_kelas_mk;
    	   siasisten         postgres    false    612    9            �            1259    26483    kategori_log    TABLE     _   CREATE TABLE kategori_log (
    id id NOT NULL,
    kategori character varying(50) NOT NULL
);
 #   DROP TABLE siasisten.kategori_log;
    	   siasisten         postgres    false    9    612            �            1259    26363    kelas_mk    TABLE     �   CREATE TABLE kelas_mk (
    idkelasmk id NOT NULL,
    tahun integer NOT NULL,
    semester integer NOT NULL,
    kode_mk character(10) NOT NULL
);
    DROP TABLE siasisten.kelas_mk;
    	   siasisten         postgres    false    612    9            �            1259    26453    lamaran    TABLE     �   CREATE TABLE lamaran (
    idlamaran id NOT NULL,
    npm character(10) NOT NULL,
    idlowongan id NOT NULL,
    id_st_lamaran id NOT NULL,
    ipk numeric(5,2) NOT NULL,
    jumlahsks integer NOT NULL,
    nip character varying(20)
);
    DROP TABLE siasisten.lamaran;
    	   siasisten         postgres    false    612    612    612    9            �            1259    26488    log    TABLE     o  CREATE TABLE log (
    idlog id NOT NULL,
    idlamaran id NOT NULL,
    npm character(10) NOT NULL,
    id_kat_log id NOT NULL,
    id_st_log id NOT NULL,
    tanggal timestamp without time zone NOT NULL,
    jam_mulai timestamp without time zone NOT NULL,
    jam_selesai timestamp without time zone NOT NULL,
    deskripsi_kerja character varying(100) NOT NULL
);
    DROP TABLE siasisten.log;
    	   siasisten         postgres    false    612    612    9    612    612            �            1259    26431    lowongan    TABLE     L  CREATE TABLE lowongan (
    idlowongan id NOT NULL,
    idkelasmk id NOT NULL,
    status boolean DEFAULT false NOT NULL,
    jumlah_asisten integer DEFAULT 0 NOT NULL,
    syarat_tambahan character varying(100),
    nipdosenpembuka character varying(20) NOT NULL,
    jumlah_pelamar integer,
    jumlah_pelamar_diterima integer
);
    DROP TABLE siasisten.lowongan;
    	   siasisten         postgres    false    612    9    612            �            1259    26383 	   mahasiswa    TABLE     �  CREATE TABLE mahasiswa (
    npm character(10) NOT NULL,
    nama character varying(100) NOT NULL,
    username character varying(30) NOT NULL,
    password character varying(20) NOT NULL,
    email character varying(100) NOT NULL,
    email_aktif character varying(100),
    waktu_kosong character varying(100),
    bank character varying(100),
    norekening character varying(100),
    url_mukatab character varying(100),
    url_foto character varying(100)
);
     DROP TABLE siasisten.mahasiswa;
    	   siasisten         postgres    false    9            �            1259    26348    mata_kuliah    TABLE     �   CREATE TABLE mata_kuliah (
    kode character(10) NOT NULL,
    nama character varying(100) NOT NULL,
    prasyarat character(10)
);
 "   DROP TABLE siasisten.mata_kuliah;
    	   siasisten         postgres    false    9            �            1259    26401    mhs_mengambil_kelas_mk    TABLE     {   CREATE TABLE mhs_mengambil_kelas_mk (
    npm character(10) NOT NULL,
    idkelasmk id NOT NULL,
    nilai numeric(5,2)
);
 -   DROP TABLE siasisten.mhs_mengambil_kelas_mk;
    	   siasisten         postgres    false    612    9            �            1259    26448    status_lamaran    TABLE     _   CREATE TABLE status_lamaran (
    id id NOT NULL,
    status character varying(20) NOT NULL
);
 %   DROP TABLE siasisten.status_lamaran;
    	   siasisten         postgres    false    612    9            �            1259    26478 
   status_log    TABLE     [   CREATE TABLE status_log (
    id id NOT NULL,
    status character varying(10) NOT NULL
);
 !   DROP TABLE siasisten.status_log;
    	   siasisten         postgres    false    612    9            �            1259    26391    telepon_mahasiswa    TABLE     t   CREATE TABLE telepon_mahasiswa (
    npm character(10) NOT NULL,
    nomortelepon character varying(20) NOT NULL
);
 (   DROP TABLE siasisten.telepon_mahasiswa;
    	   siasisten         postgres    false    9            �            1259    26358    term    TABLE     Q   CREATE TABLE term (
    tahun integer NOT NULL,
    semester integer NOT NULL
);
    DROP TABLE siasisten.term;
    	   siasisten         postgres    false    9            �          0    26378    dosen 
   TABLE DATA               U   COPY dosen (nip, nama, username, password, email, universitas, fakultas) FROM stdin;
 	   siasisten       postgres    false    188   P       	          0    26416    dosen_kelas_mk 
   TABLE DATA               1   COPY dosen_kelas_mk (nip, idkelasmk) FROM stdin;
 	   siasisten       postgres    false    192   U       	          0    26483    kategori_log 
   TABLE DATA               -   COPY kategori_log (id, kategori) FROM stdin;
 	   siasisten       postgres    false    197   �V       �          0    26363    kelas_mk 
   TABLE DATA               @   COPY kelas_mk (idkelasmk, tahun, semester, kode_mk) FROM stdin;
 	   siasisten       postgres    false    187   W       	          0    26453    lamaran 
   TABLE DATA               Z   COPY lamaran (idlamaran, npm, idlowongan, id_st_lamaran, ipk, jumlahsks, nip) FROM stdin;
 	   siasisten       postgres    false    195   bX       	          0    26488    log 
   TABLE DATA               v   COPY log (idlog, idlamaran, npm, id_kat_log, id_st_log, tanggal, jam_mulai, jam_selesai, deskripsi_kerja) FROM stdin;
 	   siasisten       postgres    false    198   4_       	          0    26431    lowongan 
   TABLE DATA               �   COPY lowongan (idlowongan, idkelasmk, status, jumlah_asisten, syarat_tambahan, nipdosenpembuka, jumlah_pelamar, jumlah_pelamar_diterima) FROM stdin;
 	   siasisten       postgres    false    193   �i       �          0    26383 	   mahasiswa 
   TABLE DATA               �   COPY mahasiswa (npm, nama, username, password, email, email_aktif, waktu_kosong, bank, norekening, url_mukatab, url_foto) FROM stdin;
 	   siasisten       postgres    false    189   �l       �          0    26348    mata_kuliah 
   TABLE DATA               5   COPY mata_kuliah (kode, nama, prasyarat) FROM stdin;
 	   siasisten       postgres    false    185   "v       	          0    26401    mhs_mengambil_kelas_mk 
   TABLE DATA               @   COPY mhs_mengambil_kelas_mk (npm, idkelasmk, nilai) FROM stdin;
 	   siasisten       postgres    false    191   �y       	          0    26448    status_lamaran 
   TABLE DATA               -   COPY status_lamaran (id, status) FROM stdin;
 	   siasisten       postgres    false    194   �}       	          0    26478 
   status_log 
   TABLE DATA               )   COPY status_log (id, status) FROM stdin;
 	   siasisten       postgres    false    196   	~        	          0    26391    telepon_mahasiswa 
   TABLE DATA               7   COPY telepon_mahasiswa (npm, nomortelepon) FROM stdin;
 	   siasisten       postgres    false    190   P~       �          0    26358    term 
   TABLE DATA               (   COPY term (tahun, semester) FROM stdin;
 	   siasisten       postgres    false    186   6�       k           2606    26420    dosen_kelas_mk_pkey 
   CONSTRAINT     e   ALTER TABLE ONLY dosen_kelas_mk
    ADD CONSTRAINT dosen_kelas_mk_pkey PRIMARY KEY (nip, idkelasmk);
 O   ALTER TABLE ONLY siasisten.dosen_kelas_mk DROP CONSTRAINT dosen_kelas_mk_pkey;
    	   siasisten         postgres    false    192    192    192            c           2606    26382 
   dosen_pkey 
   CONSTRAINT     H   ALTER TABLE ONLY dosen
    ADD CONSTRAINT dosen_pkey PRIMARY KEY (nip);
 =   ALTER TABLE ONLY siasisten.dosen DROP CONSTRAINT dosen_pkey;
    	   siasisten         postgres    false    188    188            u           2606    26487    kategori_log_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY kategori_log
    ADD CONSTRAINT kategori_log_pkey PRIMARY KEY (id);
 K   ALTER TABLE ONLY siasisten.kategori_log DROP CONSTRAINT kategori_log_pkey;
    	   siasisten         postgres    false    197    197            a           2606    26367    kelas_mk_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY kelas_mk
    ADD CONSTRAINT kelas_mk_pkey PRIMARY KEY (idkelasmk);
 C   ALTER TABLE ONLY siasisten.kelas_mk DROP CONSTRAINT kelas_mk_pkey;
    	   siasisten         postgres    false    187    187            q           2606    26457    lamaran_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY lamaran
    ADD CONSTRAINT lamaran_pkey PRIMARY KEY (idlamaran, npm);
 A   ALTER TABLE ONLY siasisten.lamaran DROP CONSTRAINT lamaran_pkey;
    	   siasisten         postgres    false    195    195    195            w           2606    26492    log_pkey 
   CONSTRAINT     F   ALTER TABLE ONLY log
    ADD CONSTRAINT log_pkey PRIMARY KEY (idlog);
 9   ALTER TABLE ONLY siasisten.log DROP CONSTRAINT log_pkey;
    	   siasisten         postgres    false    198    198            m           2606    26437    lowongan_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY lowongan
    ADD CONSTRAINT lowongan_pkey PRIMARY KEY (idlowongan);
 C   ALTER TABLE ONLY siasisten.lowongan DROP CONSTRAINT lowongan_pkey;
    	   siasisten         postgres    false    193    193            e           2606    26390    mahasiswa_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY mahasiswa
    ADD CONSTRAINT mahasiswa_pkey PRIMARY KEY (npm);
 E   ALTER TABLE ONLY siasisten.mahasiswa DROP CONSTRAINT mahasiswa_pkey;
    	   siasisten         postgres    false    189    189            ]           2606    26352    mata_kuliah_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY mata_kuliah
    ADD CONSTRAINT mata_kuliah_pkey PRIMARY KEY (kode);
 I   ALTER TABLE ONLY siasisten.mata_kuliah DROP CONSTRAINT mata_kuliah_pkey;
    	   siasisten         postgres    false    185    185            i           2606    26405    mhs_mengambil_kelas_mk_pkey 
   CONSTRAINT     u   ALTER TABLE ONLY mhs_mengambil_kelas_mk
    ADD CONSTRAINT mhs_mengambil_kelas_mk_pkey PRIMARY KEY (npm, idkelasmk);
 _   ALTER TABLE ONLY siasisten.mhs_mengambil_kelas_mk DROP CONSTRAINT mhs_mengambil_kelas_mk_pkey;
    	   siasisten         postgres    false    191    191    191            o           2606    26452    status_lamaran_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY status_lamaran
    ADD CONSTRAINT status_lamaran_pkey PRIMARY KEY (id);
 O   ALTER TABLE ONLY siasisten.status_lamaran DROP CONSTRAINT status_lamaran_pkey;
    	   siasisten         postgres    false    194    194            s           2606    26482    status_log_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY status_log
    ADD CONSTRAINT status_log_pkey PRIMARY KEY (id);
 G   ALTER TABLE ONLY siasisten.status_log DROP CONSTRAINT status_log_pkey;
    	   siasisten         postgres    false    196    196            g           2606    26395    telepon_mahasiswa_pkey 
   CONSTRAINT     n   ALTER TABLE ONLY telepon_mahasiswa
    ADD CONSTRAINT telepon_mahasiswa_pkey PRIMARY KEY (npm, nomortelepon);
 U   ALTER TABLE ONLY siasisten.telepon_mahasiswa DROP CONSTRAINT telepon_mahasiswa_pkey;
    	   siasisten         postgres    false    190    190    190            _           2606    26362 	   term_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY term
    ADD CONSTRAINT term_pkey PRIMARY KEY (tahun, semester);
 ;   ALTER TABLE ONLY siasisten.term DROP CONSTRAINT term_pkey;
    	   siasisten         postgres    false    186    186    186                       2606    26426    dosen_kelas_mk_idkelasmk_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY dosen_kelas_mk
    ADD CONSTRAINT dosen_kelas_mk_idkelasmk_fkey FOREIGN KEY (idkelasmk) REFERENCES kelas_mk(idkelasmk) ON UPDATE CASCADE ON DELETE CASCADE;
 Y   ALTER TABLE ONLY siasisten.dosen_kelas_mk DROP CONSTRAINT dosen_kelas_mk_idkelasmk_fkey;
    	   siasisten       postgres    false    2145    192    187            ~           2606    26421    dosen_kelas_mk_nip_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY dosen_kelas_mk
    ADD CONSTRAINT dosen_kelas_mk_nip_fkey FOREIGN KEY (nip) REFERENCES dosen(nip) ON UPDATE CASCADE ON DELETE CASCADE;
 S   ALTER TABLE ONLY siasisten.dosen_kelas_mk DROP CONSTRAINT dosen_kelas_mk_nip_fkey;
    	   siasisten       postgres    false    2147    192    188            z           2606    26373    kelas_mk_kode_mk_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY kelas_mk
    ADD CONSTRAINT kelas_mk_kode_mk_fkey FOREIGN KEY (kode_mk) REFERENCES mata_kuliah(kode) ON UPDATE CASCADE ON DELETE CASCADE;
 K   ALTER TABLE ONLY siasisten.kelas_mk DROP CONSTRAINT kelas_mk_kode_mk_fkey;
    	   siasisten       postgres    false    2141    185    187            y           2606    26368    kelas_mk_tahun_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY kelas_mk
    ADD CONSTRAINT kelas_mk_tahun_fkey FOREIGN KEY (tahun, semester) REFERENCES term(tahun, semester) ON UPDATE CASCADE ON DELETE RESTRICT;
 I   ALTER TABLE ONLY siasisten.kelas_mk DROP CONSTRAINT kelas_mk_tahun_fkey;
    	   siasisten       postgres    false    187    2143    186    186    187            �           2606    26468    lamaran_id_st_lamaran_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY lamaran
    ADD CONSTRAINT lamaran_id_st_lamaran_fkey FOREIGN KEY (id_st_lamaran) REFERENCES status_lamaran(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 O   ALTER TABLE ONLY siasisten.lamaran DROP CONSTRAINT lamaran_id_st_lamaran_fkey;
    	   siasisten       postgres    false    194    195    2159            �           2606    26463    lamaran_idlowongan_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY lamaran
    ADD CONSTRAINT lamaran_idlowongan_fkey FOREIGN KEY (idlowongan) REFERENCES lowongan(idlowongan) ON UPDATE CASCADE ON DELETE CASCADE;
 L   ALTER TABLE ONLY siasisten.lamaran DROP CONSTRAINT lamaran_idlowongan_fkey;
    	   siasisten       postgres    false    195    2157    193            �           2606    26473    lamaran_nip_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY lamaran
    ADD CONSTRAINT lamaran_nip_fkey FOREIGN KEY (nip) REFERENCES dosen(nip) ON UPDATE CASCADE ON DELETE SET NULL;
 E   ALTER TABLE ONLY siasisten.lamaran DROP CONSTRAINT lamaran_nip_fkey;
    	   siasisten       postgres    false    2147    188    195            �           2606    26458    lamaran_npm_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY lamaran
    ADD CONSTRAINT lamaran_npm_fkey FOREIGN KEY (npm) REFERENCES mahasiswa(npm) ON UPDATE CASCADE ON DELETE SET NULL;
 E   ALTER TABLE ONLY siasisten.lamaran DROP CONSTRAINT lamaran_npm_fkey;
    	   siasisten       postgres    false    195    189    2149            �           2606    26498    log_id_kat_log_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY log
    ADD CONSTRAINT log_id_kat_log_fkey FOREIGN KEY (id_kat_log) REFERENCES kategori_log(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 D   ALTER TABLE ONLY siasisten.log DROP CONSTRAINT log_id_kat_log_fkey;
    	   siasisten       postgres    false    197    2165    198            �           2606    26503    log_id_st_log_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY log
    ADD CONSTRAINT log_id_st_log_fkey FOREIGN KEY (id_st_log) REFERENCES status_log(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 C   ALTER TABLE ONLY siasisten.log DROP CONSTRAINT log_id_st_log_fkey;
    	   siasisten       postgres    false    198    196    2163            �           2606    26493    log_idlamaran_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY log
    ADD CONSTRAINT log_idlamaran_fkey FOREIGN KEY (idlamaran, npm) REFERENCES lamaran(idlamaran, npm) ON UPDATE CASCADE ON DELETE CASCADE;
 C   ALTER TABLE ONLY siasisten.log DROP CONSTRAINT log_idlamaran_fkey;
    	   siasisten       postgres    false    195    2161    195    198    198            �           2606    26438    lowongan_idkelasmk_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY lowongan
    ADD CONSTRAINT lowongan_idkelasmk_fkey FOREIGN KEY (idkelasmk) REFERENCES kelas_mk(idkelasmk) ON UPDATE CASCADE ON DELETE CASCADE;
 M   ALTER TABLE ONLY siasisten.lowongan DROP CONSTRAINT lowongan_idkelasmk_fkey;
    	   siasisten       postgres    false    2145    187    193            �           2606    26443    lowongan_nipdosenpembuka_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY lowongan
    ADD CONSTRAINT lowongan_nipdosenpembuka_fkey FOREIGN KEY (nipdosenpembuka) REFERENCES dosen(nip) ON UPDATE CASCADE ON DELETE RESTRICT;
 S   ALTER TABLE ONLY siasisten.lowongan DROP CONSTRAINT lowongan_nipdosenpembuka_fkey;
    	   siasisten       postgres    false    188    193    2147            x           2606    26353    mata_kuliah_prasyarat_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY mata_kuliah
    ADD CONSTRAINT mata_kuliah_prasyarat_fkey FOREIGN KEY (prasyarat) REFERENCES mata_kuliah(kode) ON UPDATE CASCADE ON DELETE SET NULL;
 S   ALTER TABLE ONLY siasisten.mata_kuliah DROP CONSTRAINT mata_kuliah_prasyarat_fkey;
    	   siasisten       postgres    false    2141    185    185            }           2606    26411 %   mhs_mengambil_kelas_mk_idkelasmk_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY mhs_mengambil_kelas_mk
    ADD CONSTRAINT mhs_mengambil_kelas_mk_idkelasmk_fkey FOREIGN KEY (idkelasmk) REFERENCES kelas_mk(idkelasmk) ON UPDATE CASCADE ON DELETE CASCADE;
 i   ALTER TABLE ONLY siasisten.mhs_mengambil_kelas_mk DROP CONSTRAINT mhs_mengambil_kelas_mk_idkelasmk_fkey;
    	   siasisten       postgres    false    191    187    2145            |           2606    26406    mhs_mengambil_kelas_mk_npm_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY mhs_mengambil_kelas_mk
    ADD CONSTRAINT mhs_mengambil_kelas_mk_npm_fkey FOREIGN KEY (npm) REFERENCES mahasiswa(npm) ON UPDATE CASCADE ON DELETE CASCADE;
 c   ALTER TABLE ONLY siasisten.mhs_mengambil_kelas_mk DROP CONSTRAINT mhs_mengambil_kelas_mk_npm_fkey;
    	   siasisten       postgres    false    189    191    2149            {           2606    26396    telepon_mahasiswa_npm_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY telepon_mahasiswa
    ADD CONSTRAINT telepon_mahasiswa_npm_fkey FOREIGN KEY (npm) REFERENCES mahasiswa(npm) ON UPDATE CASCADE ON DELETE CASCADE;
 Y   ALTER TABLE ONLY siasisten.telepon_mahasiswa DROP CONSTRAINT telepon_mahasiswa_npm_fkey;
    	   siasisten       postgres    false    190    189    2149            �   �  x��W[w�6~�
����7;�&qܤi.�nO_&F1
 (B��_ߑ�cH�K�O��\%�?f�y#���;`���=���	*�u	�+��SZا�J����/x���J���Rɕ@Xĉv�i���=w���v��߰�E�y�� <�n?M����2w���xgE�!��*L0p�P��U6��M&�M=�yt��N��%��h��؟�[;""/Ř���vw���{#�H��7�ȵr�t�P)dVn]L��1�PLG������-FZ=��.60wČ{&[�%*Qb�\jIk�*���%�C�s}��]�t�����q�V�����	A��/�����5/0�T{���ܩK>�z�(���%��Rx3�Ks��K��#G�&�~t�x!�B%�ևN�Q�z�>s�w��u�,1/R�:�1�����O㱁�2>��gr��b	��F�f4�:v0��o�k���vN������B�fF�=tIñ;�&ӷ3m�ٵ�`�\� ��F�c�1�!�h��yCӥ�Pa��������y"�PWC�+Jzge��؅wX�^�S�[^PN�).��%�	������(y,R����e�V���NڋM��S��3�z���,��g�K�Q��1�ˀj �ϳ2A�Wi���/ұ�0+�K�$v��G������`QeZ̸��T(mUm���8�b-zs�6}��,b: ��f�~�9��ܓ]�H'�!|	���9��1�J�{���4Sk�{?6���+q��V`���*j���[�̤� Ϗi��0nq���Z�Z�΄��l��9���iq�u7���8�L����z#�,�ҭ���4�ׇAQ�K�c̟0\S����z0����Է���k-��a���ձ�.1��b�=y�T3�`��G琜K:o����-,��,˔6��b=ͬ�i�ǅ��5��t�!6P�4���d#�2�nB��Q,���7�k.b�ޝo������'p�nR�g��4Vnu�qFN��,��J-n��
m]�8^n�L��Y۞\I���< �q#��m�s�m��?�ت��jۃ���ޕ[lT�U�	�F�hs6�y�����MI��,+�\O�OL��}Uj,Fn)�jw��� @�ZMjqؒ�G�U��W�۰[�-������H{+�FD������7�?�U��WC#,���N�\�����-�,i=o
�h�P��Ĉ��r�#i6~��l讅�����\b��S�#���L�������!��      	   o  x�m�kn�0�ۇ�������N��*Z�E ���*i*���v1��*e&�Y�5��n���ı�P��ڲ	���3v<�eks�ԡ�>j�Ͻ�	��CL��֚7!��5Y�{.�ೞ�\6�)O�m��+��������kc��{P���e+Gs��������>k�#��R�1�N�� �R���߸ijb#����������7�7��w�o�o�_�_?�����:~�;^�u�٣awx[Y��ށ�5��ƤR�MG��y�:�V�hJ�hV����W�RKa�MY��b-%�D5�G~k���8>�XyP�+�y���֡���r%�4㓱T�\�Y����]ك���ߟ��U��X      	   c   x�=���0k{�L �_�B!�bG4�?�w7 ��qR�Y�BG(\U�P
��\|�,h���A�3T�P� )���#W>=ܾA��C�ºi      �   D  x�mS9r�@����2���=N�E*']�����"�V$5�	P�b��EƏ_���[!�J鉨�MJ@٤̴LJ���7���]�����l���*�]�Y<���,ߐǻQT�B��=����Q^��Tv_���FI��z�����.n���T�j���H=^9Eź�*Y�e8}�6>e�W���|	��ze�!�͟��r`�`���9eǖ:��	X�:i���-z�1	�����E��Գv�� �hl��$
�.�3-&9�t	G �)�GXs�z���[�KeF�K%��t\Hæĉ��:n�J'���)�?y��$      	   �  x�uXm��*�N�'��|����O��Cf2�U;�M Y�e�E�b��֦�UZ.�\�ҏ�̫H)Ys��UpLQp�K��K�e���T��т����ѱ���>;����MpΘ{G{��'��e\��8�L|������hlW�ȥ7w �^��#��[� S�r_�wԎO|GoX>G�[����Cr���w8E���$�y5�^�d��\ܩ<�d)s�>���6j��fF_�/.;�	�H��p.g+����2IT�M�$��iFH�e��v���;�(0���aqRol 	���谸�l�������jWQ�#��#�H�l[w�����G�+ܵ"/����=r�.H�h�`�8j�!yddbHb�p6��f��e���������+����Jq�q1����Z_觌�����65`3vT�,{�Q`�jp� Z[��ߴ��E%���u�l�š��
&�u?�g�}�0:���HY�E��p�-��^��ި����7���!�mi�͗�J񈯗[tǕ��_�_�:��]����~'�t'hC��0`o��Kt oe'�EW=�To��ѭ;�D�%0�Ho/�)��'����W S���+�%C�A�=�s�����|�G�g���]���K8Q�g�CE���L�;�{�/���_���W�d�?|e��_��C$\ڻ�Ӕ-�ꮯZ�[=]���u�ʟ�������|�1^��,�9��/��y"����o1�� ��)�=�UPŒ���+��/H�Зm|�B#8��L�kT��ygIY���a�@��>�f�E��HW���0�ф0�k&H���]ͳ��F��U��09n	w��v�8��Fbm��Dx�r7f�i�s#�j�['�^�0,NŜ`��8��0\^8��P�t$7��s�&�W��HPc���Em�Z�`p[�-� ���Ю����3�(!���9�8P_��ڿQ\T$6�W�Tx#��6���=��#|�[RI���hP�a�	nI�3�����7���H��L^�t���q�E� ]�����E��@CͰ��]�q�[�nS��I�;��v�KQe\�(�pW�L�Ǆ�a�+H�^_0_���xA��SW#�ԅ��ϝ{�E��ڡ��
�qȬz��>�'��c�nj����
?��ą�iDo=i�����qo������}�I��*��i��Y��P����������OR���� �l)rbf;>"�*m^Q	~tT�߽�A�53��(�|�9|hى;����8��r�|Y��SqUc> �#ǥ��Ľ�ᩪ�1�	�B�:Ҹh�~f�tD���C�9Nv�X��_����ᇞkQ��m�W���n3Eh��h�� 1h_��BF9ZRRhqG��[�@���}�i|s��r�O�����:�s�O?� ^K<��z3Y8��c1oM	�?LeM~��Y���帾i8=NeD�i%n)����g"CtSL5z�bl��e���q��)ߒ� ��?�A�M�2����c$�h�!)y�����х��uBE��X���(���
ΰ���.��9��	���z��D��a��^[yrj��<�?d��u�v�p�]
�${#��rjfyT�\�5V��T����%�O��� KM�i}X��cY>��@��J��,J�x^#T���)cRՋ�=Ƴ85��'��#�e��������O8^Q��}RJ��c&      	   �
  x����n]7�����d Q�}�޸�0�I��ż�P���Ee{��d!֑)��#u�K����8o���Dg��.}u���O�������]s���������}ɼz%�S_��T�����SAY=��]�޵�_~��>�������������k��Bńh\�)�`�5�k���A�}��P׾�|�������W�ޛX�'�_J4��\?��OH�BB�~�����Qʏ(e
&�dei��97�������O������}�w�P���`]��$8g�OhZ��B׾�|���ϗ���s�Ѓ�3�e�s�������?������>��qD(>V�_��3C�HY���k�Y�ջ�9�l�팓o���w�p�����9�5�Ư�sJ��!(��A�F�!�9Z-��F��J-C��Db��x�hhW�f�E��xEY��TG��&s��*jE�s��'ԙ����9�k%"C�I�����;p�hr�<8=)7� �Q�C��9�
A}RR��+�Q�C;�h�Px8R�(kW��CXs�� JE�cP�(kWƣ�v�hIVԉ�g��?A���&s�R�"�9(�� �QC[s�%"C���E��|G-�x��^��n�{����ša��bE� �`��lG-퐣��f-�X��+�Q��!�9|�"�!�^e<jih��IbD�38x��[y:�����`�	M�������[��.���	^/Q�y�U�>yIȣ'���ռ�*^�$	�у�o�ռ��;���>k�@=x�\�K�h͢T ��~G�<Mh�Q�E�@=x��[e:�����Ԋ�G^�i�Ys��XK����%j5��/ŉ�<z�z�YM#���V!�GO^/I����S��P ���^E�5G�(ȣ'�ߐ+M�r�o��ȣ'��x+O�{�"j����7�*�z��*J����%j5m�����7`-ȣ'���մ�y}������%i5-���E�@=y�.�D��[��
�ѓ�K�j������k�@=x��[y���h��ȣ�ߘ�i�r4&Q"�G^���s�Z3GsH�< ��~ì�=0��Qgr����oB���Vn{he����؜�Z�b��r�C[تk[1!p��k�jۏ�;����O���x�Q���C[��k;UqJW�µ�U����9��k��\	�w��Aiر��C�2�E�X&��KÞ%|��H�uX5�.�r8
�\z��C�"�}Φ��j2�B��ɷ]Ʈ9M#kg[��n[IkG��F�O;g
�ѩg��pQp��h4'G͸e�[�e�k+%�dF;�j���G�kY���b��&�y�cb�y���۾!v�V2�JF�Al��E���������"�ڱ�8��\��4!D44�����ם\�*)ŏ�`��!=2�{����Z�}	m#!���f��l ݵ�����m	kj�`(�MI0�����@mf�����|�ĕs����Fu�sw35��W��u�KÝQuX��E��3�('mJ��:.�����9C�;�s�94�v�[�J9C[�I�߭}�����8e:���{q~Fİ�rÝ:�b�n���/~v0KI<}P%�����O�����N��NwO���1\ g}��u��p��D)-���ī}u�/7�q�04b��v�bX]w�{\�~q��v��}�;���4C�V`ߐ&�Դ�_�}��pIѯ��-7��-�+č}��fp��LSB�4��y��w�d����
K�|�����B۔ԟ��l���G���{ϔ�ӇNۋ��Yxo��}��Ik��Rz)����c�;^�1����i�KKr�O�?�T��K1e�<�Q\S�N��b>���b�srM�?8Z#�4���ޟ|Sb�~f�p^��|k�;
��Bs�l����'�r��z��)�$�\��p�3�͝e���.��YJ�Q�<�o�[�Pb����̕��8�H��f)��7�g�����6~�3% ��S9P6��a?���77 ʇ�Om�F�t�}s����|Z�֐�}s���}F�b�a`O�D��1P�;�?�lRY�G�ʍȫc����t�@����1Ӽ��p∌r�K��<�y�O8l�[z�N	B�=�9�s��q�r�tJ���R���z<��yJ�*=y� j"��:%�&T���A�6}�>%
�Ftq&�C��Yw��\v����	�:�ő
���@7���Ά��3����}nT�1��l͡B8n[͍���:�N��AF�������{G�N��L�`������O`�w��э�\�o��ӂ�H�ĔV�K�e���o�i`�qQƱ�
{k��e�;��F�!��㌟��$���بN6ZӦ=��D۹�QoE���2�uRq勒�z+�}���j���N�Nn*��+b�jK�^�V���s�n�X�
�O�xo��^T�t�'#��OO��;���16��	��'������2��#����1%
uUe�����g��g�m膞���H��M	A��� Ιxx}=��FAE�����N�>񔹣O�~��(|�?��-s��-�+g��"s;����2���X`��y�ܞ�h�C�,��ǌ9�~�o<R⎋�M |�mKcY��8y��_@����%��	cܨ'+��6�a��h���7�)��� G}f��N����BmW$by��J�!:<�Un�,�;��7�!�kީ�}���d��7�!���~5-6����Y	:�q�n�B��hV�%����__�|�����      	   �  x�mT[r�0��O�t� A��	�4N��v2����|��,��k.���P 18�ܛ��p>���t9\��y�u�/�I���4]�/���aD��90�{~���/a�c��w~�����?�����y������p� �������,:Vx�2�^G�g@���l�A�,�u����}~=L����L1�Ǥ'H?w�S�u.w0�hNy�97[��ν^"��M}h�%�z��gTe) Ӻ^|���ͩ�#,��M}��'$�~��� k����{�9V�J=�a�$�mNR�r�e���P��7lx��ʘ���׆�p�����~B.�o����-v���a��� �y�[(�/ƭ�jV�d U���1��NF�c�a�1���0Z$�IG��ܱ�<��CS[k�̅ȄXo]U
��� ����7�
�m��\�vZ�G*kX�Q^#֊l*TQ���iq=���kg��Ჰ�xz��ʊ��Da�L��"1�rI��6�0oKi�Tn��JH�Ԏ�X��E�]t�;[����aCi0�1���d
��u.u�~z�ž,�[�E�,܎�o��²�э=Xjɬ��2����j}y��*���҈,W���V;|3@VJ}�AM�����,C����S[n^m��$�[m� 7��>���v��x      �   y	  x��Z�v�8}���?�wI��'vbw�Τgrr���`q�AR	��SPh+�f��K�X�E$��(\,<7$��x��WZԜ5�j����Ŭ����x��k�W�GO��Ml˳�^���4�k��.�}R��z���F�o����+���F��sI޶���7o�,{V�,�qo"��8�~i�ڻ*�ե��K�\���sBr��,il]�V�9kzN���A@D�
V�	�u�x���»��d��nι�t.�`���6�ͩ���Ed�*�,X�]Jk�c�HMbvE�K����B�ʑ�cwt�ɬ��XH��X�ca����IY�����p����Z�3j��+(�%0_������-�;�����J��r���]�
�
�Z���2��@;��&�K�7��g�t�{m�H�|'�W�2t���嬪��my1�.�kH{8i?�'	"�pJ?31�>)hC��E"�
(-!}zD���ۜ3�s�$�.D{7_�ڌ�~�)D��X�
�h�����*���L��%�P�w�4�^����_F��b?�X`�0Z5P���M�폜Pw1��'��X����.\�����*���I&e���/�#>1��l��H�����3k�Ȭ;����s�n��O�*���}	t[����0���C�U�=��5�j�:^Hُ �h�9��E8��
��`)���Y��@"��#���q�h��A�8�7q6�� BSɺ�Cί;�(�h����KS섚���\�x�uu�L�B����R`DSl�\�cn8��2�'Pk�،��̋"_%�"�A�V1۵T�%F��v
������_���%��Ȭ;��@l�#8�(4-�6��J�Tϫ��ȧ���]�=h.�؎ձ�(���ry>����jk]u��u��8���imS�
a���բ���L�`���Y��x��'Kយ�p��� L��	�]I[�e�nסH/���g��mo�$��/��!y�#�.G��{���h�Ǟya�}���m)D8� �Xz�� �#$�#'~Q�N��SO벻����*N��+`��d�ti
O�6U�C����Q��?ਡav�KS藻� 3���8�;��X�vP� Xq��x���G�q~.��.O�tn��I@!�{�6��m�
ҦB��.M��� �@-������ԲT`v.0��h
+뎷\�� ���iU�?qY���
ч�M�pi�c��޺�67���M��9�8HST_	��j�X�� ���G2��:�G�[Z%D�K`Y�Ҷ�LB����,x���0�Z z�׭A���aHR�Ɇ��/�Bo{��@i9gEA6��m�鮆���q|����Jz������8骶�%0Lt%ÿA2Z�P*�(p�"C���w�ZjZj��<�vC���T�\"3��45y��%�����ќ�|�o��I��A�H`rQW��EGv%>��t����Sj\[�Q�A�<~d.y�R?� ���x�Ɖ\:��07:�Go� ��6����Vr��.�f�X:7�܅�n����O�:�s�|%�i���F�*#B�S�Ҕ��@��esYSl�@�-ɱ���ƀx�>�� �g|�˄sP=O���P�rٍ䐲Y��x�6�]Uq&����j�����EЫ=Ɓ�V���	���P��(�!B�Ӡ(z[��!��8.�9%K�4B3af�Tt�NxR��Qvz$%d��+V^�2/D�S��Ҹ��̭�������V�j�	yN�"���7�le��$!�O�fLQ�1��>	Ĭ$Д���vx�X&�9�S?�v��:��I�Hy_��SҴ	��##!�S��7ȵ:�RT�P�Wd��?�	��t��	E�Va^K�i&`&����m�9<�W�Ӫ�D�����X?*ltXE�
]o�n��$���9���'��f2!��O��������l��e7�V�s6��M-����'	�9m����q�˧K� ̎)�~�-g�K���GB�)Ɨ*;l&ICd�%��:�.C]xz}B���@��.y��c3�<B3���%Cr��5OBfk��h��'Ilu�bV�(}�&��4�U�\��,����uےF��1ۡh|�@,��՞	!�!��_XIZ�M5 b6B1��{�b����Y�b�z�'4J�ካ_�ނ���`Ts@��"�կH�=ӷ]�9rE�6G�� f���3XM~�V� �{��5-9��(�Mj���T)���V1ڟ��"e�W����%��lf���li
�}W/�IQМ���gK����ӌA�8a"��ouQP�,ډ12kQ��ƪ�<c3%BF��o��?7	�{�C}*x��9���>���\�������\`���6HSp�P}�����t�����p)^��1�8�(٩.M1e�|lG��uZd�W����çg/8�=��ө���p��w����?:�)      �   Y  x�mT�r�0<��§�e˖��(I9Ɔ�M�%�(��WV6�~G4b�)�
��f�G3+^ `A s^��n|��E��^s���3oV�.4	�(�MRnr�K������U�)��%��Ly#����f��t��c������!�|�SLng��f�Hy��o�`Rq���O�E�|�%.�����?K��} �E�ʳw0[�B����K��[师,�OV�zS.r >��ǘ'��㬈�w���q���S�7G��偹��O�lt�ע-������zU�3<���x��T��T}��P6��	A�9vow�o�\N{��NE�z�"��� ��[$X�V
�-�{"Ѝ������ժ~�x�?U=��J���Z̕����l��Q �l��O5����Z ŀY�c�?���b�j��=>r�hs�	 ��_r�N��KJ+�՛J���:R���ְ�~a�NB�08W���F@`��P�N���Ra��0t�q�=ۺnUsY�Bc"@Nx�MrY�����Wb�VTY�=��>��D�奮��;4�����&���bR�{�L㭨�i���H�*`���E0��P�V����qu�%l�����N�I~@"�'ʤE�����ȨK!�D*�#*��W�޶)����ؓTײv[�Z�<Klŋ( "��V�vr�Gﯦ�uj����tc�%c�jU5�j1t8?H��K��Lq
KJ�)�$z���2,���F��g��9f�5�j���ڣ��h���E�nV�hƓ�LY�l�l�߃�C�)dr���#~��Q[lҫ@�0ﶝ��n�G�岳�aF�ӛ�UFݮ���O;c�����y� l]�f      	   #  x�mV���(|��b+�O{���X�(O�\�M���5*5Q.*M)u�7�2O��:aΒH�DUʊ�Tचgk�%I���U�I��S��u�y�2BH�	g�VW�QF9���1���Z�Iͣ*�p��e˻��5f��$|�j_'�D��V[�����d=:��ꍛ$�3Ƒ�Wo� zBD���J�AE����6:#���I�c���il�,���
b%��'D�������j��R4��AԊ�v�j�`�d�A9ۑ\Z��-(S�@�~����Ic		��0;��%���!�J����ʇf]?�0i����0i�����&�>�0y��C	��?�0y�%L(}(a� XR�<�lo)�-ؗ�ۇ�j�����?��b�M[-�F��Q	'��ח��9��7:���9������$hk>iؚ�L�uu.W�78T�I6��Kw��tv�v���)'������0���JV\%��4.�����r�[��+/�YA����N�&B'���*Z1����{).<�0�OEoۢ-�.7D�|/�:nP����[�k����b�Ck?q?���q�>�ѻl�%�~c���+t�Y_S�^�O��>�v+�)6,/H�j1asH�6~M�0��}�/�fw�W{��6��K�OQ��g�嚖|=��Jy�~y�~I U(�(�Sp;5�h�?��GC��wL�0�_�w��ӷ
~ �<��ݯS�W^�I�E���%x�myV�CT���vv��Ynͫ�I]Qՠߵ����K�u�<i�'F�~3}\�M
��3A܊��u��z�kl��Tm�noH��^"���r��_
�}a���ջ���$��� F��/H�t�����`���n��֜����H��충��}��s���c���,��� �']���߲�e@���~�+�?���/~�-.)6�=&̮���3 ~�~ 6v`����zޏk��&�?i��[�y�ү�/�ی|e����앃[q�	؆���xH��f�mۏ+�$=���EN�������??���      	   ;   x�3��u�q�u�2�t�r���u�sq��v��2
��y�:r����>��\1z\\\ q��      	   7   x�3�t��q��v��2r�]CB�B=����Go. + �?�5�+F��� ?��       	   �  x�]�ݱc9�������"��?��tlW��TMF4���.U��O�����̵��\|�m����L���ZmVo<Γ'�����7^��w����;8O���̛�mm�����xD�_����7��*%�!n"K˿��(S�"I�R&�����_9y��$����T~�-'��� B"��<���-�����.�G7���E�Ch͛f�^�5�K�LJ���~�ݾ�	��S��)MIe-4��
����ܳ��>��*��ý��s�pRIE���>�d�|�~^��(DJlR�~�$��:wSo�܎)jv�~:�*�TD��Q�~���4����tN{$�rHX�j�pHV���pH��h���K��;���T��
s�=o���8Tw��rH{����`�I+>����M�`���v8$����p��h����.��`@s8���+ǗCx	�������k'�K�(ؤ���(N�7��>TW�vbu�g�L�I{�O|ǒ��*��a������e�]S4�(����o��`^qmm�8nCЖ냁zZ����Ђ�)���W}��7�w�T���#�ֻ���C���:�ˏ�Z:�Fy7c$K�����_Tg@`��'�Hץ�/�/��O�訃/��ŭ��a�ӡ�t�� l�b�����a7��{�,�ٔ���i�|tK��Y��L�"���]ƍ�������޸�]gȫ�h٠U��#���}�F"��\hn9]>��*��d_E2���2pw��'���<�4�m
>�ҹb� ����
��e.�3���';l3S[a'��W��.S��Gb��瘝>�r2H��V���zpW�4�U�����[�����>6�߼��0���b&OV����������}����r���v`��6ù7���-��ŗA�hΆ��+[���4sQ��b�k寸�=��9Ȳ�.�g� ���
��߿k��@	�h      �      x�3204�4�2QFʘ+F��� 7@�     