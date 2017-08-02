--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.3
-- Dumped by pg_dump version 9.6.3

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: cabecera; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE cabecera (
    idcabecera integer NOT NULL,
    idcliente integer NOT NULL,
    idcaja integer NOT NULL,
    fecha timestamp without time zone NOT NULL,
    subtotal numeric NOT NULL,
    iva numeric NOT NULL,
    total numeric NOT NULL,
    estado character varying(1) NOT NULL
);


--
-- Name: cabecera_idcabecera_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE cabecera_idcabecera_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: cabecera_idcabecera_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE cabecera_idcabecera_seq OWNED BY cabecera.idcabecera;


--
-- Name: caja; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE caja (
    idcaja integer NOT NULL,
    idusuario integer NOT NULL,
    numero numeric(3,0)
);


--
-- Name: caja_idcaja_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE caja_idcaja_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: caja_idcaja_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE caja_idcaja_seq OWNED BY caja.idcaja;


--
-- Name: clientes; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE clientes (
    idcliente integer NOT NULL,
    idtipo integer NOT NULL,
    cedula character varying(10) NOT NULL,
    nombre character varying(50) NOT NULL,
    apellido character varying(50) NOT NULL,
    nacimiento date,
    ciudad character varying(30),
    direccion character varying(100),
    telefono character varying(10),
    email character varying(50),
    estado character varying(1) DEFAULT 'A'::character varying
);


--
-- Name: clientes_idcliente_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE clientes_idcliente_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: clientes_idcliente_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE clientes_idcliente_seq OWNED BY clientes.idcliente;


--
-- Name: detalle; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE detalle (
    iddetalle integer NOT NULL,
    idcabecera integer,
    idproducto integer NOT NULL,
    cantidad integer,
    valor_unitario numeric,
    valor_total numeric
);


--
-- Name: detalle_iddetalle_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE detalle_iddetalle_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: detalle_iddetalle_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE detalle_iddetalle_seq OWNED BY detalle.iddetalle;


--
-- Name: empleados; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE empleados (
    idempleado integer NOT NULL,
    cedula character varying(10) NOT NULL,
    nombre character varying(50) NOT NULL,
    apellido character varying(50) NOT NULL,
    direccion character varying(100),
    telefono character varying(10),
    nacimiento date,
    estado character varying(1) DEFAULT 'A'::character varying,
    ciudad character varying(30)
);


--
-- Name: empleados_idempleado_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE empleados_idempleado_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: empleados_idempleado_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE empleados_idempleado_seq OWNED BY empleados.idempleado;


--
-- Name: facturas_pendientes; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE facturas_pendientes (
    idpendiente integer NOT NULL,
    idcabecera integer NOT NULL,
    abono numeric(8,0),
    saldo numeric(8,0) NOT NULL
);


--
-- Name: facturas_pendientes_idpendiente_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE facturas_pendientes_idpendiente_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: facturas_pendientes_idpendiente_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE facturas_pendientes_idpendiente_seq OWNED BY facturas_pendientes.idpendiente;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE migrations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE migrations_id_seq OWNED BY migrations.id;


--
-- Name: password_resets; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE password_resets (
    email character varying(50) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp without time zone
);


--
-- Name: permission_role; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE permission_role (
    permission_id integer NOT NULL,
    role_id integer NOT NULL
);


--
-- Name: permissions; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE permissions (
    id integer NOT NULL,
    name character varying(50) NOT NULL,
    display_name character varying(255),
    description character varying(255),
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


--
-- Name: permissions_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE permissions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: permissions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE permissions_id_seq OWNED BY permissions.id;


--
-- Name: productos; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE productos (
    idproducto integer NOT NULL,
    stock integer NOT NULL,
    nombrep character varying(40) NOT NULL,
    descripcion character varying(200) NOT NULL,
    valor numeric NOT NULL
);


--
-- Name: productos_idproducto_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE productos_idproducto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: productos_idproducto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE productos_idproducto_seq OWNED BY productos.idproducto;


--
-- Name: role_user; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE role_user (
    user_id integer NOT NULL,
    role_id integer NOT NULL
);


--
-- Name: roles; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE roles (
    id integer NOT NULL,
    name character varying(50) NOT NULL,
    display_name character varying(255),
    description character varying(255),
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


--
-- Name: roles_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE roles_id_seq OWNED BY roles.id;


--
-- Name: tipo_cliente; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE tipo_cliente (
    idtipo integer NOT NULL,
    detalle character varying(2) NOT NULL
);


--
-- Name: tipo_cliente_idtipo_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE tipo_cliente_idtipo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: tipo_cliente_idtipo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE tipo_cliente_idtipo_seq OWNED BY tipo_cliente.idtipo;


--
-- Name: tipos_usuario; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE tipos_usuario (
    idtipo integer NOT NULL,
    detalle character varying(30)
);


--
-- Name: tipos_usuario_idtipo_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE tipos_usuario_idtipo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: tipos_usuario_idtipo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE tipos_usuario_idtipo_seq OWNED BY tipos_usuario.idtipo;


--
-- Name: users; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE users (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(50) NOT NULL,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);


--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE usuarios (
    idusuario integer NOT NULL,
    idempleado integer,
    idtipo integer,
    aliasusuario character varying(20),
    passwordusuario character varying(20)
);


--
-- Name: usuarios_idusuario_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE usuarios_idusuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: usuarios_idusuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE usuarios_idusuario_seq OWNED BY usuarios.idusuario;


--
-- Name: cabecera idcabecera; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY cabecera ALTER COLUMN idcabecera SET DEFAULT nextval('cabecera_idcabecera_seq'::regclass);


--
-- Name: caja idcaja; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY caja ALTER COLUMN idcaja SET DEFAULT nextval('caja_idcaja_seq'::regclass);


--
-- Name: clientes idcliente; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY clientes ALTER COLUMN idcliente SET DEFAULT nextval('clientes_idcliente_seq'::regclass);


--
-- Name: detalle iddetalle; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY detalle ALTER COLUMN iddetalle SET DEFAULT nextval('detalle_iddetalle_seq'::regclass);


--
-- Name: empleados idempleado; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY empleados ALTER COLUMN idempleado SET DEFAULT nextval('empleados_idempleado_seq'::regclass);


--
-- Name: facturas_pendientes idpendiente; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY facturas_pendientes ALTER COLUMN idpendiente SET DEFAULT nextval('facturas_pendientes_idpendiente_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY migrations ALTER COLUMN id SET DEFAULT nextval('migrations_id_seq'::regclass);


--
-- Name: permissions id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY permissions ALTER COLUMN id SET DEFAULT nextval('permissions_id_seq'::regclass);


--
-- Name: productos idproducto; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY productos ALTER COLUMN idproducto SET DEFAULT nextval('productos_idproducto_seq'::regclass);


--
-- Name: roles id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY roles ALTER COLUMN id SET DEFAULT nextval('roles_id_seq'::regclass);


--
-- Name: tipo_cliente idtipo; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY tipo_cliente ALTER COLUMN idtipo SET DEFAULT nextval('tipo_cliente_idtipo_seq'::regclass);


--
-- Name: tipos_usuario idtipo; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY tipos_usuario ALTER COLUMN idtipo SET DEFAULT nextval('tipos_usuario_idtipo_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Name: usuarios idusuario; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY usuarios ALTER COLUMN idusuario SET DEFAULT nextval('usuarios_idusuario_seq'::regclass);


--
-- Data for Name: cabecera; Type: TABLE DATA; Schema: public; Owner: -
--

COPY cabecera (idcabecera, idcliente, idcaja, fecha, subtotal, iva, total, estado) FROM stdin;
1	2	4	2017-08-01 12:17:34	20.14	2.4160714285714313	22.549999999999997	A
2	2	4	2017-08-01 17:32:36	0.45	0.0535714285714286	0.5	I
3	1	4	2017-08-01 18:53:19	10.44642857142857	1.25357142857143	11.7	A
\.


--
-- Name: cabecera_idcabecera_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('cabecera_idcabecera_seq', 3, true);


--
-- Data for Name: caja; Type: TABLE DATA; Schema: public; Owner: -
--

COPY caja (idcaja, idusuario, numero) FROM stdin;
4	1	2
\.


--
-- Name: caja_idcaja_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('caja_idcaja_seq', 4, true);


--
-- Data for Name: clientes; Type: TABLE DATA; Schema: public; Owner: -
--

COPY clientes (idcliente, idtipo, cedula, nombre, apellido, nacimiento, ciudad, direccion, telefono, email, estado) FROM stdin;
2	1	1001296969	Anderson	Vivas	1995-01-22	Ibarra	Ibarra	0993494321	vivas251@gmail.com	A
1	2	1003744149	Anderson	Vivas	1995-01-22	Ibarra	Ibarra	0993494321	vivas251@gmail.com	A
\.


--
-- Name: clientes_idcliente_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('clientes_idcliente_seq', 2, true);


--
-- Data for Name: detalle; Type: TABLE DATA; Schema: public; Owner: -
--

COPY detalle (iddetalle, idcabecera, idproducto, cantidad, valor_unitario, valor_total) FROM stdin;
2	2	7	1	50.00	5.00
3	3	11	10	15.00	15.00
4	3	5	2	460.00	92.00
5	3	7	2	50.00	1.00
\.


--
-- Name: detalle_iddetalle_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('detalle_iddetalle_seq', 5, true);


--
-- Data for Name: empleados; Type: TABLE DATA; Schema: public; Owner: -
--

COPY empleados (idempleado, cedula, nombre, apellido, direccion, telefono, nacimiento, estado, ciudad) FROM stdin;
1	1003744149	Anderson	Vivas	Ibarra	0993494321	1995-01-22	A	Ibarra
\.


--
-- Name: empleados_idempleado_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('empleados_idempleado_seq', 1, true);


--
-- Data for Name: facturas_pendientes; Type: TABLE DATA; Schema: public; Owner: -
--

COPY facturas_pendientes (idpendiente, idcabecera, abono, saldo) FROM stdin;
\.


--
-- Name: facturas_pendientes_idpendiente_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('facturas_pendientes_idpendiente_seq', 1, false);


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: -
--

COPY migrations (id, migration, batch) FROM stdin;
\.


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('migrations_id_seq', 1, false);


--
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: -
--

COPY password_resets (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: permission_role; Type: TABLE DATA; Schema: public; Owner: -
--

COPY permission_role (permission_id, role_id) FROM stdin;
\.


--
-- Data for Name: permissions; Type: TABLE DATA; Schema: public; Owner: -
--

COPY permissions (id, name, display_name, description, created_at, updated_at) FROM stdin;
\.


--
-- Name: permissions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('permissions_id_seq', 1, false);


--
-- Data for Name: productos; Type: TABLE DATA; Schema: public; Owner: -
--

COPY productos (idproducto, stock, nombrep, descripcion, valor) FROM stdin;
5	10	Leche	Descremada	4.60
6	30	panes	negros	4.51
7	20	Arina	flor	0.50
11	400	CHICLES	Clicles Agogo 5 unidades	0.15
\.


--
-- Name: productos_idproducto_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('productos_idproducto_seq', 97, true);


--
-- Data for Name: role_user; Type: TABLE DATA; Schema: public; Owner: -
--

COPY role_user (user_id, role_id) FROM stdin;
1	1
2	1
\.


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: -
--

COPY roles (id, name, display_name, description, created_at, updated_at) FROM stdin;
1	admin	Administrador	\N	\N	\N
2	cajero	Cajero	\N	\N	\N
\.


--
-- Name: roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('roles_id_seq', 1, true);


--
-- Data for Name: tipo_cliente; Type: TABLE DATA; Schema: public; Owner: -
--

COPY tipo_cliente (idtipo, detalle) FROM stdin;
1	CR
2	EF
\.


--
-- Name: tipo_cliente_idtipo_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('tipo_cliente_idtipo_seq', 2, true);


--
-- Data for Name: tipos_usuario; Type: TABLE DATA; Schema: public; Owner: -
--

COPY tipos_usuario (idtipo, detalle) FROM stdin;
\.


--
-- Name: tipos_usuario_idtipo_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('tipos_usuario_idtipo_seq', 1, false);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: -
--

COPY users (id, name, email, password, remember_token, created_at, updated_at) FROM stdin;
1	Anderson	vivas251@gmail.com	$2y$10$aNZj2PsnlWTxbw5gk7oEfO79vWtg6N4ialqKPSFh1bKY7LYB6jy6u	bcqrjxeAASd1SXwS2cmholMPgGpwDhVEp16IrVU6Kb6ypbVZl6x9c7IsJh8R	2017-07-31 21:15:39	2017-07-31 21:15:39
2	David	davidcad963@gmail.com	$2y$10$/cWx36JHDEIi7NXFHrmYb.t1dQwOwmxdCLU4vpsAfp2sidAM7c6P2	OLfdkNVrBvFZapBYzBV182d9ewnWbUnYxbWhp0La8TgDwCL2y0SZtR61KQYu	2017-08-01 15:41:50	2017-08-01 15:41:50
\.


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('users_id_seq', 2, true);


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: -
--

COPY usuarios (idusuario, idempleado, idtipo, aliasusuario, passwordusuario) FROM stdin;
\.


--
-- Name: usuarios_idusuario_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('usuarios_idusuario_seq', 1, false);


--
-- Name: cabecera cabecera_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY cabecera
    ADD CONSTRAINT cabecera_pk PRIMARY KEY (idcabecera);


--
-- Name: caja caja_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY caja
    ADD CONSTRAINT caja_pk PRIMARY KEY (idcaja);


--
-- Name: clientes clientes_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY clientes
    ADD CONSTRAINT clientes_pk PRIMARY KEY (idcliente);


--
-- Name: detalle detalle_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY detalle
    ADD CONSTRAINT detalle_pk PRIMARY KEY (iddetalle);


--
-- Name: empleados empleados_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY empleados
    ADD CONSTRAINT empleados_pk PRIMARY KEY (idempleado);


--
-- Name: facturas_pendientes facturas_pendientes_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY facturas_pendientes
    ADD CONSTRAINT facturas_pendientes_pk PRIMARY KEY (idpendiente);


--
-- Name: migrations migrations_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY migrations
    ADD CONSTRAINT migrations_pk PRIMARY KEY (id);


--
-- Name: permission_role permission_role_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY permission_role
    ADD CONSTRAINT permission_role_pk PRIMARY KEY (permission_id, role_id);


--
-- Name: permissions permissions_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY permissions
    ADD CONSTRAINT permissions_pk PRIMARY KEY (id);


--
-- Name: productos productos_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY productos
    ADD CONSTRAINT productos_pk PRIMARY KEY (idproducto);


--
-- Name: role_user role_user_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY role_user
    ADD CONSTRAINT role_user_pk PRIMARY KEY (user_id, role_id);


--
-- Name: roles roles_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY roles
    ADD CONSTRAINT roles_pk PRIMARY KEY (id);


--
-- Name: tipo_cliente tipo_cliente_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY tipo_cliente
    ADD CONSTRAINT tipo_cliente_pk PRIMARY KEY (idtipo);


--
-- Name: tipos_usuario tipos_usuario_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY tipos_usuario
    ADD CONSTRAINT tipos_usuario_pk PRIMARY KEY (idtipo);


--
-- Name: users users_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pk PRIMARY KEY (id);


--
-- Name: usuarios usuarios_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_pk PRIMARY KEY (idusuario);


--
-- Name: fk_pendientes; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fk_pendientes ON facturas_pendientes USING btree (idcabecera);


--
-- Name: fk_reference_1; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fk_reference_1 ON cabecera USING btree (idcliente);


--
-- Name: fk_reference_10; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fk_reference_10 ON cabecera USING btree (idcaja);


--
-- Name: fk_reference_11; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fk_reference_11 ON clientes USING btree (idtipo);


--
-- Name: fk_reference_2; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fk_reference_2 ON detalle USING btree (idcabecera);


--
-- Name: fk_reference_3; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fk_reference_3 ON detalle USING btree (idproducto);


--
-- Name: fk_reference_7; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fk_reference_7 ON usuarios USING btree (idempleado);


--
-- Name: fk_reference_8; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fk_reference_8 ON caja USING btree (idusuario);


--
-- Name: fk_reference_9; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX fk_reference_9 ON usuarios USING btree (idtipo);


--
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX password_resets_email_index ON password_resets USING btree (email);


--
-- Name: permission_role_role_id_foreign; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX permission_role_role_id_foreign ON permission_role USING btree (role_id);


--
-- Name: permissions_name_unique; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX permissions_name_unique ON permissions USING btree (name);


--
-- Name: role_user_role_id_foreign; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX role_user_role_id_foreign ON role_user USING btree (role_id);


--
-- Name: roles_name_unique; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX roles_name_unique ON roles USING btree (name);


--
-- Name: users_email_unique; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX users_email_unique ON users USING btree (email);


--
-- Name: caja fk_idusers; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY caja
    ADD CONSTRAINT fk_idusers FOREIGN KEY (idusuario) REFERENCES users(id);


--
-- Name: facturas_pendientes fk_pendientes; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY facturas_pendientes
    ADD CONSTRAINT fk_pendientes FOREIGN KEY (idcabecera) REFERENCES cabecera(idcabecera);


--
-- Name: cabecera fk_reference_1; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY cabecera
    ADD CONSTRAINT fk_reference_1 FOREIGN KEY (idcliente) REFERENCES clientes(idcliente);


--
-- Name: cabecera fk_reference_10; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY cabecera
    ADD CONSTRAINT fk_reference_10 FOREIGN KEY (idcaja) REFERENCES caja(idcaja);


--
-- Name: clientes fk_reference_11; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY clientes
    ADD CONSTRAINT fk_reference_11 FOREIGN KEY (idtipo) REFERENCES tipo_cliente(idtipo);


--
-- Name: facturas_pendientes fk_reference_12; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY facturas_pendientes
    ADD CONSTRAINT fk_reference_12 FOREIGN KEY (idcabecera) REFERENCES cabecera(idcabecera);


--
-- Name: detalle fk_reference_2; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY detalle
    ADD CONSTRAINT fk_reference_2 FOREIGN KEY (idcabecera) REFERENCES cabecera(idcabecera);


--
-- Name: detalle fk_reference_3; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY detalle
    ADD CONSTRAINT fk_reference_3 FOREIGN KEY (idproducto) REFERENCES productos(idproducto);


--
-- Name: usuarios fk_reference_7; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT fk_reference_7 FOREIGN KEY (idempleado) REFERENCES empleados(idempleado);


--
-- Name: usuarios fk_reference_9; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT fk_reference_9 FOREIGN KEY (idtipo) REFERENCES tipos_usuario(idtipo);


--
-- Name: permission_role permission_role_permission_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY permission_role
    ADD CONSTRAINT permission_role_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES permissions(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: permission_role permission_role_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY permission_role
    ADD CONSTRAINT permission_role_role_id_foreign FOREIGN KEY (role_id) REFERENCES roles(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: role_user role_user_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY role_user
    ADD CONSTRAINT role_user_user_id_foreign FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

