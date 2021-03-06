<?php


define ("SEPARADOR_ARCHIVOS",";");

define ("VERSION_APP",'1.0.0');
define ("REVISION_CONTROLADOR_VERSIONES", 6);
define ("NOMBRE_SOFTWARE","Octoplus Admin");
define ("NOMBRE_APP",NOMBRE_SOFTWARE." ".VERSION_APP." Rev. ".REVISION_CONTROLADOR_VERSIONES." - by Play Technologies &reg");

define ("DIR_IMAGEN_REPORTE",realpath(dirname(__FILE__)).'/../images/');
define ("NOMBRE_IMAGEN_REPORTE","img_report.jpg");
define ("IMAGEN_REPORTE", DIR_IMAGEN_REPORTE . NOMBRE_IMAGEN_REPORTE );

define("INT_NULL",-999999);

define("SI", "S");
define("NO", "N");
define("PDF", "PDF");
define("EXCEL", "Excel");
define("SEPARADOR_PRODUCTOS", ",");

define("EST_ACTIVO", "A");
define("EST_INACTIVO", "I");
define("SRV_ACTIVO", "A");
define("SRV_INACTIVO", "I");
define("SRV_INICIADO", "IN");
define("SRV_TERMINADO", "T");
define("SRV_ENTREGADO", "E");
define("SRV_ACTIVO_LBL", "Activo");
define("SRV_INACTIVO_LBL", "Inactivo");
define("SRV_INICIADO_LBL", "Iniciado");
define("SRV_TERMINADO_LBL", "Terminado");
define("SRV_ENTREGADO_LBL", "Entregado");
define("USUARIO_WEB", "W");
define("USUARIO_MOVIL", "M");
define("USUARIO_WEB_LBL", "Web");
define("USUARIO_MOVIL_LBL", "Movil");

/*
 * Permisos
 */
define("PERFIL_ADMIN_TRABAJADOR", 1);
define("PERFIL_ADMIN_CATEGORIAS", 2);
define("PERFIL_ADMIN_ITEMS", 3);
define("PERFIL_ADMIN_USUARIOS", 4);
define("PERFIL_ADMIN_PERFIL_USUARIO", 5);
define("PERFIL_RESTABLECER_CLAVE", 6);
define("PERFIL_ADMIN_PRODUCTOS", 7);
define("PERFIL_ADMIN_SERVICIOS", 8);
define("PERFIL_ADMIN_SEDES", 9);
define("PERFIL_ADMIN_UNIDAD_NEGOCIO", 10);
define("PERFIL_ADMIN_EMPRESAS", 11);
define("PERFIL_ADMIN_TIPOS_VEHICULO", 12);
/**
 * Servicios Http
 */
define("WS_AUTENTICAR_USUARIO", "AutenticarUsuario");
define("WS_OBTENER_SEDES_USUARIO", "GetSedesByUsuario");
define("WS_ACTUALIZAR_TRABAJADOR", "ActualizarTrabajador");
define("WS_ELIMINAR_TRABAJADOR", "EliminarTrabajador");
define("WS_FILTER_DATAGRID", "FilterDataGrid");
define("WS_OBTENER_UNI_NEGOCIO_USUARIO", "GetUniNegocioUsuario");
define("WS_ACTUALIZAR_CATEGORIA", "ActualizarCategoria");
define("WS_ELIMINAR_CATEGORIA", "EliminarCategoria");
define("WS_OBTENER_CATEGORIAS_USUARIO", "GetCategoriasByUsuario");
define("WS_ACTUALIZAR_ITEM", "ActualizarItem");
define("WS_ELIMINAR_ITEM", "EliminarItem");
define("WS_OBTENER_ITEMS_USUARIO", "GetItemsByUsuario");
define("WS_OBTENER_TIPO_VEH_USUARIO", "GetTipoVehiculoByUsuario");
define("WS_ACTUALIZAR_PRODUCTO", "ActualizarProducto");
define("WS_ELIMINAR_PRODUCTO", "EliminarProducto");
define("WS_ACTUALIZAR_USUARIO", "ActualizarUsuario");
define("WS_ELIMINAR_USUARIO", "EliminarUsuario");
define("WS_OBTENER_USUARIOS_USUARIO", "GetUsuariosByUsuario");
define("WS_OBTENER_OPCIONES", "GetOpciones");
define("WS_OBTENER_OPCIONES_USUARIO", "GetOpcionesByUsuario");
define("WS_ACTUALIZAR_PERFIL_USUARIO", "ActualizarPerfilUsuario");
define("WS_RESTABLECER_CLAVE_USUARIO", "RestablecerClaveUsuario");
define("WS_FILTRAR_SERVICIOS", "FiltrarServicios");
define("WS_OBTENER_TRABAJADORES_USUARIO", "GetTrabajadoresByUsuario");
define("WS_ACTUALIZAR_ESTADO_SERVICIO", "ActualizarEstadoServicio");
define("WS_REASIGNAR_SERVICIO", "ReasignarServicio");
define("WS_OBTENER_DEPARTAMENTOS", "GetDepartamentos");
define("WS_OBTENER_CIUDADES_BY_DEPARTAMENTO", "GetCiudadesByDepartamento");
define("WS_ACTUALIZAR_SEDE", "ActualizarSede");
define("WS_ELIMINAR_SEDE", "EliminarSede");
define("WS_ACTUALIZAR_UNIDAD_NEGOCIO", "ActualizarUnidadnegocio");
define("WS_ELIMINAR_UNIDAD_NEGOCIO", "EliminarUnidadNegocio");
define("WS_ACTUALIZAR_EMPRESA", "ActualizarEmpresa");
define("WS_OBTENER_EMPRESAS", "GetEmpresas");
define("WS_ELIMINAR_EMPRESA", "EliminarEmpresa");
define("WS_ACTUALIZAR_TIPO_VEHICULO", "ActualizarTipoVehiculo");
define("WS_OBTENER_TIPO_VEHICULO", "GetTipoVehiculo");
define("WS_ELIMINAR_TIPO_VEHICULO", "EliminarTipoVehiculo");
define("WS_OBTENER_TIPO_VEHICULO_GENERAL", "getTipoVehiculoloGeneral");
define("WS_OBTENER_UNIDAD_NEGOCIO_GENERAL", "getUnidadNegocioGeneral");
define("WS_OBTENER_PRODUCTOS_BY_USUARIO_TIPOVEHICULO", "GetProductosByUsuarioTipoVehiculo");
define("WS_VALIDAR_REINGRESO_VEHICULO", "ValidarReingresoVehiculo");
define("WS_REGISTRAR_SERVICIO", "RegistrarServicio");
define("WS_OBTENER_CLIENTE_BY_PLACA", "GetInfoClienteByPlaca");

define("WS_TEST_MYSQL", "testMysql");

/**
 * Tablas
 */
define("TBL_TRABAJADOR", "trabajador");
define("TBL_CATEGORIA", "categoria");
define("TBL_ITEM", "item");
define("TBL_PRODUCTO", "producto");
define("TBL_USUARIO", "usuario");
define("TBL_SEDE", "sede");
define("TBL_UNIDAD_NEGOCIO", "unidadnegocio");
define("TBL_EMPRESA", "empresa");
define("TBL_TIPO_VEHICULO", "tipovehiculo");

define("ID_USER_SUPER_ADMIN", 1);
?>
