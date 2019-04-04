
-- 1.- CREATE USER blancosdbadmin WITH PASSWORD 'bl@ncosdb@admin';

-- 2.- CREATE DATABASE blancosdb WITH OWNER = blancosdbadmin ENCODING = 'UTF8';

-- 3.- ALTER SCHEMA public OWNER TO blancosdbadmin;

-- 4 grant all privileges on database blancosdb to blancosdbadmin;

-- 5.- 

CREATE SEQUENCE public.usuarios_id_usuario_seq;

CREATE TABLE public.usuarios (
                id_usuario INTEGER NOT NULL DEFAULT nextval('public.usuarios_id_usuario_seq'),
                nombre VARCHAR(30) NOT NULL,
                a_paterno VARCHAR(20) NOT NULL,
                a_materno VARCHAR(20) NOT NULL,
                email VARCHAR(35) NOT NULL,
                contrasenia VARCHAR(15) NOT NULL,
                CONSTRAINT id_usuario PRIMARY KEY (id_usuario)
);


ALTER SEQUENCE public.usuarios_id_usuario_seq OWNED BY public.usuarios.id_usuario;

CREATE SEQUENCE public.tallas_id_talla_seq;

CREATE TABLE public.tallas (
                id_talla INTEGER NOT NULL DEFAULT nextval('public.tallas_id_talla_seq'),
                descripcion VARCHAR(30) NOT NULL,
                CONSTRAINT id_talla PRIMARY KEY (id_talla)
);


ALTER SEQUENCE public.tallas_id_talla_seq OWNED BY public.tallas.id_talla;

CREATE SEQUENCE public.lineas_id_linea_seq;

CREATE TABLE public.lineas (
                id_linea INTEGER NOT NULL DEFAULT nextval('public.lineas_id_linea_seq'),
                nombre VARCHAR(50) NOT NULL,
                descripcion VARCHAR(100),
                CONSTRAINT id_linea PRIMARY KEY (id_linea)
);


ALTER SEQUENCE public.lineas_id_linea_seq OWNED BY public.lineas.id_linea;

CREATE TABLE public.linea_tallas (
                id_linea INTEGER NOT NULL,
                id_talla INTEGER NOT NULL,
                CONSTRAINT linea_tallas_id PRIMARY KEY (id_linea, id_talla)
);


CREATE SEQUENCE public.catalogos_id_catalogo_seq;

CREATE TABLE public.catalogos (
                id_catalogo INTEGER NOT NULL DEFAULT nextval('public.catalogos_id_catalogo_seq'),
                nombre VARCHAR(30) NOT NULL,
                descripcion VARCHAR(100),
                publicacion DATE ,
                CONSTRAINT id_catalogo PRIMARY KEY (id_catalogo)
);


ALTER SEQUENCE public.catalogos_id_catalogo_seq OWNED BY public.catalogos.id_catalogo;

CREATE SEQUENCE public.categorias_id_categoria_seq;

CREATE TABLE public.categorias (
                id_categoria INTEGER NOT NULL DEFAULT nextval('public.categorias_id_categoria_seq'),
                nombre VARCHAR(30) NOT NULL,
                descripcion VARCHAR(100),
                CONSTRAINT id_categoria PRIMARY KEY (id_categoria)
);


ALTER SEQUENCE public.categorias_id_categoria_seq OWNED BY public.categorias.id_categoria;

CREATE SEQUENCE public.productos_id_producto_seq;

CREATE TABLE public.productos (
                id_producto INTEGER NOT NULL DEFAULT nextval('public.productos_id_producto_seq'),
                nombre VARCHAR(40) NOT NULL,
                descripcion VARCHAR(200) NOT NULL,
                imagen VARCHAR(100) NOT NULL,
                estilo VARCHAR(20) NOT NULL,
                material VARCHAR(20) NOT NULL,
                estampado VARCHAR(20) NOT NULL,
                CONSTRAINT id_producto PRIMARY KEY (id_producto)
);


ALTER SEQUENCE public.productos_id_producto_seq OWNED BY public.productos.id_producto;

CREATE TABLE public.producto_tallas (
                id_producto INTEGER NOT NULL,
                id_talla INTEGER NOT NULL,
                precio REAL NOT NULL,
                CONSTRAINT id_producto_tallas PRIMARY KEY (id_producto, id_talla)
);


CREATE TABLE public.categoria_lineas (
                id_linea INTEGER NOT NULL,
                id_categoria INTEGER NOT NULL,
                id_producto INTEGER NOT NULL,
                CONSTRAINT id_categoria_lineas PRIMARY KEY (id_linea, id_categoria, id_producto)
);


CREATE TABLE public.catalogo_categorias (
                id_categoria INTEGER NOT NULL,
                id_catalogo INTEGER NOT NULL,
                id_producto INTEGER NOT NULL,
                CONSTRAINT catalogo_categorias_pk PRIMARY KEY (id_categoria, id_catalogo, id_producto)
);


CREATE TABLE public.administradores (
                id_administrador INTEGER NOT NULL,
                imagen VARCHAR,
                CONSTRAINT id_administrador PRIMARY KEY (id_administrador)
);


CREATE TABLE public.clientes (
                id_cliente INTEGER NOT NULL,
                tel_casa VARCHAR(10),
                num_celular VARCHAR(10),
                CONSTRAINT id_cliente PRIMARY KEY (id_cliente)
);


CREATE SEQUENCE public.pedidos_id_pedido_seq;

CREATE TABLE public.pedidos (
                id_pedido INTEGER NOT NULL DEFAULT nextval('public.pedidos_id_pedido_seq'),
                id_cliente INTEGER NOT NULL,
                estado_pago VARCHAR NOT NULL,
                estado_entrega VARCHAR NOT NULL,
                total REAL NOT NULL,
                CONSTRAINT pedidos_id PRIMARY KEY (id_pedido)
);


ALTER SEQUENCE public.pedidos_id_pedido_seq OWNED BY public.pedidos.id_pedido;

CREATE TABLE public.tickets (
                id_pedido INTEGER NOT NULL,
                id_producto INTEGER NOT NULL,
                subtotal REAL NOT NULL,
                cantidad SMALLINT NOT NULL,
                CONSTRAINT id_ticket PRIMARY KEY (id_pedido, id_producto)
);


CREATE SEQUENCE public.direcciones_id_direccion_seq;

CREATE TABLE public.direcciones (
                id_direccion INTEGER NOT NULL DEFAULT nextval('public.direcciones_id_direccion_seq'),
                id_cliente INTEGER NOT NULL,
                calle_num VARCHAR(30) NOT NULL,
                cp VARCHAR(5) NOT NULL,
                estado VARCHAR(25) NOT NULL,
                municipio VARCHAR(30) NOT NULL,
                CONSTRAINT id_direccion PRIMARY KEY (id_direccion)
);


ALTER SEQUENCE public.direcciones_id_direccion_seq OWNED BY public.direcciones.id_direccion;

ALTER TABLE public.administradores ADD CONSTRAINT usuarios_administradores_fk
FOREIGN KEY (id_administrador)
REFERENCES public.usuarios (id_usuario)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.clientes ADD CONSTRAINT usuarios_clientes_fk
FOREIGN KEY (id_cliente)
REFERENCES public.usuarios (id_usuario)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.linea_tallas ADD CONSTRAINT tallas_linea_tallas_fk
FOREIGN KEY (id_talla)
REFERENCES public.tallas (id_talla)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.producto_tallas ADD CONSTRAINT tallas_producto_tallas_fk
FOREIGN KEY (id_talla)
REFERENCES public.tallas (id_talla)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.categoria_lineas ADD CONSTRAINT lineas_linea_categoria_fk
FOREIGN KEY (id_linea)
REFERENCES public.lineas (id_linea)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.linea_tallas ADD CONSTRAINT lineas_linea_tallas_fk
FOREIGN KEY (id_linea)
REFERENCES public.lineas (id_linea)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.catalogo_categorias ADD CONSTRAINT catalogo_catalogo_categorias_fk
FOREIGN KEY (id_catalogo)
REFERENCES public.catalogos (id_catalogo)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.catalogo_categorias ADD CONSTRAINT categorias_catalogo_categorias_fk
FOREIGN KEY (id_categoria)
REFERENCES public.categorias (id_categoria)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.categoria_lineas ADD CONSTRAINT categorias_linea_categoria_fk
FOREIGN KEY (id_categoria)
REFERENCES public.categorias (id_categoria)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.tickets ADD CONSTRAINT productos_tickets_fk
FOREIGN KEY (id_producto)
REFERENCES public.productos (id_producto)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.catalogo_categorias ADD CONSTRAINT productos_catalogo_categorias_fk
FOREIGN KEY (id_producto)
REFERENCES public.productos (id_producto)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.categoria_lineas ADD CONSTRAINT productos_linea_categoria_fk
FOREIGN KEY (id_producto)
REFERENCES public.productos (id_producto)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.producto_tallas ADD CONSTRAINT productos_producto_tallas_fk
FOREIGN KEY (id_producto)
REFERENCES public.productos (id_producto)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.direcciones ADD CONSTRAINT clientes_direcciones_fk
FOREIGN KEY (id_cliente)
REFERENCES public.clientes (id_cliente)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.pedidos ADD CONSTRAINT clientes_pedidos_fk
FOREIGN KEY (id_cliente)
REFERENCES public.clientes (id_cliente)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.tickets ADD CONSTRAINT pedidos_tickets_fk
FOREIGN KEY (id_pedido)
REFERENCES public.pedidos (id_pedido)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

-- ==================================================================================================
-- =========================================       DATOS     ========================================
-- ==================================================================================================
-- Table lineas
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (1,	'Edredones y Colchas'	,	'Los mejores edredones y colchas de México'	);
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (2,	'Cobertores y Frazadas'	, 'Los mejores cobertores y frazadas de México'	);
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (3,	'Sábanas y Rodapie'	,	'Los mejores sabanas y rodapies de México'	);
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (4,	'Almohadas y Fundas'	, 'Los mejores almohadas y fundas de México'	);
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (5,	'Cortinas'	, 'Los mejores cortinas de México'	);
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (6,	'Colchones'	, 'Los mejores colchones de México'	);
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (7,	'Cojines y Fundas'	, 'Los mejores cojines y fundas de México'	);
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (8,	'Pijamas y Batas'	, 'Los mejores pijamas y batas de México'	);
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (9,	'Fragancias y Bienestar'	, 'Los mejores fragancias y bienestar de México'	);
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (10,	'Decoración'	, 'Las mejores decoraciones de México'	);
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (11,	'Edredones'	, 'Los mejores edredones de México'	);
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (12,	'Cobertores'	, 'Los mejores cobertores de México'	);
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (13,	'Sábanas y Toallas'	, 'Los mejores sabanas y toallas de México'	);
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (14,	'Accesorios Bebé'	, 'Los mejores accesorias para bebe'	);
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (15,	'Protectores y Cubiertas'	, 'Los mejores protectores y cubiertas de México'	);
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (16,	'Tapetes'	, 'Los mejores tapetes de México'	);
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (17,	'Adornos de Pared'	, 'Los mejores adornos de pared de México'	);
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (18,	'Toallas'	, 'Los mejores toallas de México'	);
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (19,	'Cortinas y Juegos de baño'	, 'Los mejores cortinas y juegos de baño en México'	);
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (20,	'Batas y Pijamas'	, 'Los mejores batas y pijamas de México'	);
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (21,	'Accesorios de Baño'	, 'Los mejores accesorios de baño en México'	);
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (22,	'Manteles y Caminos de Mesa'	, 'Los mejores manteles y caminos en México'	);
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (23,	'Cortinas de Cocina'	, 'Los mejores cortinas de cocina de México'	);
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (24,	'Accesorios de Cocina'	, 'Los mejores accesorios de cocina de México'	);
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (25,	'Mascotas'	, 'Los mejores accesorios para mascotas en México'	);
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (26,	'Organización y Lavanderia'	, 'Los mejores organizadores para la lavanderia'	);
INSERT INTO public.lineas (id_linea, nombre, descripcion) VALUES (27,	'Muebles'	, 'Los accesoriso para mueblas en México'	);

-- Table categorias
INSERT INTO public.categorias (id_categoria, nombre, descripcion) VALUES (1,	'Recamara'	, 'Los accesoriso para recamara'	);
INSERT INTO public.categorias (id_categoria, nombre, descripcion) VALUES (2,	'Niñ@s y Chav@s'	, 'Los accesoriso para niñ@s y chav@s'	);
INSERT INTO public.categorias (id_categoria, nombre, descripcion) VALUES (3,	'Bebe'	, 'Los accesoriso para bebe'	);
INSERT INTO public.categorias (id_categoria, nombre, descripcion) VALUES (4,	'Sala'	, 'Los accesoriso para su sala'	);
INSERT INTO public.categorias (id_categoria, nombre, descripcion) VALUES (5,	'Decoración'	, 'Los accesoriso para la decoracion'	);
INSERT INTO public.categorias (id_categoria, nombre, descripcion) VALUES (6,	'Baño'	, 'Los accesoriso para su baño'	);
INSERT INTO public.categorias (id_categoria, nombre, descripcion) VALUES (7,	'Cocina Comedor'	, 'Los accesoriso para su cocina y comedor'	);
INSERT INTO public.categorias (id_categoria, nombre, descripcion) VALUES (8,	'Mascotas'	, 'Los accesoriso para esa mascota'	);
INSERT INTO public.categorias (id_categoria, nombre, descripcion) VALUES (9,	'Organizacion y Lavanderia'	, 'Los accesoriso la organizacion de su lavanderia'	);
INSERT INTO public.categorias (id_categoria, nombre, descripcion) VALUES (10,	'Muebles'	, 'Los accesoriso para sus muebles'	);

-- Table catalogo
INSERT INTO public.catalogos (id_catalogo, nombre, descripcion, publicacion) VALUES (1,	'Verano'	, 'El verano esta aqui y nuestros accesorios te esperan', '2018-06-12');
INSERT INTO public.catalogos (id_catalogo, nombre, descripcion, publicacion) VALUES (2,	'Invierno'	, 'El invierno esta aqui y nuestros accesorios te esperan', '2018-09-01');
INSERT INTO public.catalogos (id_catalogo, nombre, descripcion, publicacion) VALUES (3,	'Chavos'	, 'Los chavos requieren de nuestros accesorios', '2018-01-02');
INSERT INTO public.catalogos (id_catalogo, nombre, descripcion, publicacion) VALUES (4,	'Bebé'	, 'Todo lo necesario para cuidar a tu bebe', '2018-02-15');

-- Table tallas
INSERT INTO public.tallas (id_talla, descripcion) VALUES (1, 'CHICA');
INSERT INTO public.tallas (id_talla, descripcion) VALUES (2, 'MEDIANA');
INSERT INTO public.tallas (id_talla, descripcion) VALUES (3, 'GRANDE');
INSERT INTO public.tallas (id_talla, descripcion) VALUES (4, 'UNITALLA');
INSERT INTO public.tallas (id_talla, descripcion) VALUES (5, 'INDIVDUAL');
INSERT INTO public.tallas (id_talla, descripcion) VALUES (6, 'MATRIMONIAL');
INSERT INTO public.tallas (id_talla, descripcion) VALUES (7, 'LARGA');
INSERT INTO public.tallas (id_talla, descripcion) VALUES (8, 'CORTO');

-- TABLE productos
    -- productos categoria 1
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (1, 'COLCHA ANTAR', '', '', 'CLASICO', 'ALGODON', 'ESTAMPADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (2, 'EDREDÓN ASPEN', '', '', 'CLASICO', 'ALGODON', 'ESTAMPADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (3, 'COLCHA AUSTRALIA', '', '', 'CLASICO', 'ALGODON', 'ESTAMPADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (4, 'EDREDÓN BILBAO', '', '', 'CLASICO', 'ALGODON', 'ESTAMPADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (5, 'COLCHA CAMELIA', '', '', 'CLASICO', 'ALGODON', 'ESTAMPADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (6, 'EDREDÓN CIUDADES', '', '', 'CLASICO', 'ALGODON', 'ESTAMPADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (7, 'COLCHA CRETA', '', '', 'CLASICO', 'ALGODON', 'ESTAMPADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (8, 'COLCHA FLOR DE DURAZNO', '', '', 'CLASICO', 'ALGODON', 'ESTAMPADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (9, 'COLCHA FLOR DE DURAZNO', '', '', 'CLASICO', 'ALGODON', 'ESTAMPADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (10, 'EDREDÓN FLORENCIA', '', '', 'CLASICO', 'ALGODON', 'ESTAMPADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (11, 'EDREDÓN BASIC CHEDRÓN', '', '', 'CLASICO', 'ALGODON', 'LISO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (12, 'EDREDÓN BASIC HUMO', '', '', 'CLASICO', 'ALGODON', 'LISO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (13, 'EDREDÓN BASIC MAGENTA', '', '', 'CLASICO', 'ALGODON', 'LISO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (14, 'EDREDÓN BASIC TINTO', '', '', 'CLASICO', 'ALGODON', 'LISO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (15, 'EDREDÓN BASIC TURQUESA', '', '', 'CLASICO', 'ALGODON', 'LISO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (16, 'EDREDÓN FRESH AQUAMARINA', '', '', 'CLASICO', 'ALGODON', 'LISO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (17, 'EDREDÓN FRESH SEPIA', '', '', 'CLASICO', 'ALGODON', 'LISO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (18, 'EDREDÓN NOVO LILA', '', '', 'CLASICO', 'ALGODON', 'LISO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (19, 'EDREDÓN NOVO BLANCO', '', '', 'CLASICO', 'ALGODON', 'LISO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (20, 'EDREDÓN PALENQUE', '', '', 'CLASICO', 'ALGODON', 'BORDADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (21, 'EDREDÓN PLUMAS', '', '', 'CLASICO', 'ALGODON', 'BORDADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (22, 'EDREDÓN TABASCO', '', '', 'CLASICO', 'ALGODON', 'BORDADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (23, 'EDREDÓN NOVO CORAL', '', '', 'CLASICO', 'ALGODON', 'BORDADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (24, 'EDREDÓN NOVO CORAL', '', '', 'CLASICO', 'ALGODON', 'BORDADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (25, 'EDREDÓN NOVO CORAL', '', '', 'CLASICO', 'ALGODON', 'BORDADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (26, 'EDREDÓN NOVO CORAL', '', '', 'CLASICO', 'ALGODON', 'BORDADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (27, 'EDREDÓN NOVO CORAL', '', '', 'CLASICO', 'ALGODON', 'BORDADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (28, 'EDREDÓN NOVO CORAL', '', '', 'CLASICO', 'ALGODON', 'BORDADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (29, 'EDREDÓN NOVO CORAL', '', '', 'CLASICO', 'ALGODON', 'BORDADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (30, 'EDREDÓN CÓRCEGA', '', '', 'CLASICO', 'ALGODON', 'TEXTURA');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (31, 'EDREDÓN VOGA GRIS', '', '', 'CLASICO', 'ALGODON', 'TEXTURA');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (32, 'EDREDÓN NOVO CORAL', '', '', 'CLASICO', 'ALGODON', 'TEXTURA');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (33, 'EDREDÓN NOVO CORAL', '', '', 'CLASICO', 'ALGODON', 'TEXTURA');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (34, 'EDREDÓN NOVO CORAL', '', '', 'CLASICO', 'ALGODON', 'TEXTURA');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (35, 'EDREDÓN NOVO CORAL', '', '', 'CLASICO', 'ALGODON', 'TEXTURA');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (36, 'EDREDÓN NOVO CORAL', '', '', 'CLASICO', 'ALGODON', 'TEXTURA');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (37, 'EDREDÓN NOVO CORAL', '', '', 'CLASICO', 'ALGODON', 'TEXTURA');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (38, 'EDREDÓN NOVO CORAL', '', '', 'CLASICO', 'ALGODON', 'TEXTURA');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (39, 'EDREDÓN NOVO CORAL', '', '', 'CLASICO', 'ALGODON', 'TEXTURA');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (40, 'EDREDÓN NOVO CORAL', '', '', 'CLASICO', 'ALGODON', 'TEXTURA');
    -- productos categoria 2
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (41, 'COBERTOR INVERNAL ALASKA', '', '', 'MODERNO', 'ALGODON', 'ESTAMPADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (42, 'COBERTOR NORDICO BANFF', '', '', 'MODERNO', 'ALGODON', 'ESTAMPADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (43, 'COBERTO LIGERO BARROW', '', '', 'MODERNO', 'ALGODON', 'ESTAMPADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (44, 'COBERTO LIGERO DEEP BLUE', '', '', 'MODERNO', 'ALGODON', 'ESTAMPADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (45, 'COBERTO LIGERO DINAMARCA', '', '', 'MODERNO', 'POLIESTER', 'ESTAMPADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (46, 'COBERTOR EVEREST FINLANDIA', '', '', 'MODERNO', 'ALGODON', 'ESTAMPADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (47, 'COBERTOR AUSTRAL GRIS', '', '', 'MODERNO', 'ALGODON', 'ESTAMPADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (48, 'COBERTOR EVEREST GROENLANDIA', '', '', 'MODERNO', 'ALGODON', 'ESTAMPADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (49, 'COBERTO LIGERO KINGSTON', '', '', 'MODERNO', 'ALGODON', 'ESTAMPADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (50, 'COBERTO LIGERO KINGSTON', '', '', 'MODERNO', 'ALGODON', 'ESTAMPADO');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (51, 'COBERTOR NORDICO BANFF', '', '', 'MODERNO', 'POLIESTER', 'TEXTURA');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (52, 'COBERTOR INVERNAL ALASKA', '', '', 'MODERNO', 'ALGODON', 'TEXTURA');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (53, 'COBERTO LIGERO BARROW', '', '', 'MODERNO', 'POLIESTER', 'TEXTURA');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (54, 'COBERTO LIGERO DEEP BLUE', '', '', 'MODERNO', 'POLIESTER', 'TEXTURA');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (55, 'COBERTO LIGERO DINAMARCA', '', '', 'MODERNO', 'ALGODON', 'TEXTURA');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (56, 'COBERTOR EVEREST FINLANDIA', '', '', 'MODERNO', 'ALGODON', 'TEXTURA');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (57, 'COBERTOR AUSTRAL GRIS', '', '', 'MODERNO', 'ALGODON', 'TEXTURA');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (58, 'COBERTOR EVEREST GROENLANDIA', '', '', 'MODERNO', 'ALGODON', 'TEXTURA');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (59, 'COBERTO LIGERO KINGSTON', '', '', 'MODERNO', 'POLIESTER', 'TEXTURA');
INSERT INTO public.productos (id_producto, nombre, descripcion, imagen, estilo, material, estampado) VALUES (60, 'COBERTOR POLAR LETRAS', '', '', 'MODERNO', 'POLIESTER', 'TEXTURA');


-- Table catalogo_categorias
INSERT INTO public.catalogo_categorias (id_catalogo, id_categoria, id_producto) VALUES (1, 1, 10);
INSERT INTO public.catalogo_categorias (id_catalogo, id_categoria, id_producto) VALUES (1, 1, 1);
INSERT INTO public.catalogo_categorias (id_catalogo, id_categoria, id_producto) VALUES (1, 1, 4);
INSERT INTO public.catalogo_categorias (id_catalogo, id_categoria, id_producto) VALUES (1, 1, 7);
INSERT INTO public.catalogo_categorias (id_catalogo, id_categoria, id_producto) VALUES (1, 1, 9);
INSERT INTO public.catalogo_categorias (id_catalogo, id_categoria, id_producto) VALUES (2, 2, 1);
INSERT INTO public.catalogo_categorias (id_catalogo, id_categoria, id_producto) VALUES (2, 2, 3);
INSERT INTO public.catalogo_categorias (id_catalogo, id_categoria, id_producto) VALUES (2, 5, 5);
INSERT INTO public.catalogo_categorias (id_catalogo, id_categoria, id_producto) VALUES (2, 5, 7);
INSERT INTO public.catalogo_categorias (id_catalogo, id_categoria, id_producto) VALUES (2, 5, 21);

-- Table categoria_lineas
    -- producto de linea 1
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 1, 1);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 1, 2);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 1, 3);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 1, 11);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 1, 12);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 1, 13);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 1, 14);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 1, 15);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 1, 4);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 1, 5);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 1, 6);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 1, 30);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 1, 7);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 1, 8);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 1, 9);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 1, 10);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 1, 16);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 1, 17);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 1, 18);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 1, 19);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 1, 20);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 1, 21);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 1, 22);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 1, 23);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (2, 1, 3);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (2, 1, 12);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (2, 1, 13);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (2, 1, 14); 
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (2, 1, 15);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (2, 1, 16);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (2, 1, 18);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (2, 1, 23);
    -- productos de linea 2
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 2, 41);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 2, 42);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 2, 43);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 2, 44);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 2, 45);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 2, 46);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 2, 47);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 2, 48);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 2, 49);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 2, 50);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 2, 51);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 2, 52);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 2, 53);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 2, 54);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (1, 2, 55);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (2, 2, 42);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (2, 2, 43);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (2, 2, 44);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (2, 2, 51);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (2, 2, 55);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (2, 2, 53);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (2, 2, 54);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (2, 2, 57);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (2, 2, 49);
INSERT INTO public.categoria_lineas (id_categoria, id_linea, id_producto) VALUES (2, 2, 60);

-- Table linea_tallas
-- INSERT INTO public.linea_tallas (id_linea, id_talla) VALUES ();

-- Table linea_tallas
-- INSERT INTO public.producto_tallas (id_producto, id_talla, precio) VALUES ();


-- Table usuarios
INSERT INTO public.usuarios (id_usuario, nombre, a_paterno, a_materno, email, contrasenia) VALUES (1, 'KEVIN', 'MONTALVO', 'FLORES', 'kevin@admin.com','@pajarito');
INSERT INTO public.usuarios (id_usuario, nombre, a_paterno, a_materno, email, contrasenia) VALUES (2, 'CYNTHIA', 'GONZALES', 'ANDRADE', 'cynthia@admin.com','@cinthia');
INSERT INTO public.usuarios (id_usuario, nombre, a_paterno, a_materno, email, contrasenia) VALUES (3, 'YOSADARA', 'GIMEZ', 'PINEDA', 'yosadara@admin.com','@bebesita');
INSERT INTO public.usuarios (id_usuario, nombre, a_paterno, a_materno, email, contrasenia) VALUES (4, 'ERICK', 'VILLA', 'POMIE', 'erick@admin.com','@bobesponja');
INSERT INTO public.usuarios (id_usuario, nombre, a_paterno, a_materno, email, contrasenia) VALUES (5, 'CARELIA', 'GONZALES', 'SANTO', 'carelia_cliente@gmail.com','careliapass');
INSERT INTO public.usuarios (id_usuario, nombre, a_paterno, a_materno, email, contrasenia) VALUES (6, 'FERNANDA', 'CASTRO', 'PEREZ', 'fercastro@gmail.com','ferpass');

-- Table clientes
INSERT INTO public.clientes (id_cliente, num_celular, tel_casa) VALUES (5, '2391451605', '');
INSERT INTO public.clientes (id_cliente, num_celular, tel_casa) VALUES (6, '2391451605', '');

-- Table direcciones
INSERT INTO public.direcciones (id_direccion, id_cliente, calle_num, estado, municipio, cp) VALUES (1, 5, 'PONIENTE 8 #22', 'VERACRUZ', 'POTRERO', '94965');
INSERT INTO public.direcciones (id_direccion, id_cliente, calle_num, estado, municipio, cp) VALUES (2, 6, 'REFORMA SUR #54', 'PUEBLA', 'AJALPAN', '75910');

-- Table adminstradores
INSERT INTO public.administradores (id_administrador, imagen) VALUES (1, '');
INSERT INTO public.administradores (id_administrador, imagen) VALUES (2, '');
INSERT INTO public.administradores (id_administrador, imagen) VALUES (3, '');
INSERT INTO public.administradores (id_administrador, imagen) VALUES (4, '');

-- Table pedidos
-- INSERT INTO public.pedidos (id_pedido, id_cliente, estado_pago, estado_entrega, total) VALUES ();

-- Table tickets
-- INSERT INTO public.tickets (id_pedido, id_producto, subtotal, cantidad) VALUES ();

