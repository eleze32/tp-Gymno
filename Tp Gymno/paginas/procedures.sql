CREATE PROCEDURE CrearGaleriaProductos(IN limite int,
										IN lotes int,
										IN subtipo varchar(20),
										IN pagina varchar(10), 
										OUT codigo_p int,
										OUT nombre_p varchar(60),
										OUT precio_u decimal(5,2),
										OUT img blob)
BEGIN
   if pagina = 'home' then
   		select codigo_producto, nombre_producto, precio_unidad, imagen 
   		into codigo_p, nombre_p, precio_u, img
   		from producto 
   		inner join producto_venta 
   		on codigo_producto = id_producto 
   		where Cantidad_Vendidos > 10 
   		order by Cantidad_Vendidos desc 
   		limit limite, lotes;
   else
   		select codigo_producto, nombre_producto, precio_unidad, imagen
   		into codigo_p, nombre_p, precio_u, img 
   		from producto 
   		inner join producto_venta 
   		on codigo_producto = id_producto 
   		inner join subtipo_producto 
   		on subtipo_producto = id_subtipo_producto 
   		and nombre = subtipo
   		limit limite, lotes;
   end if;
END