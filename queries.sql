CREATE TABLE Perfil x Menu 
( 
 idUsuario INT,  
 idMenu INT,  
  FOREIGN KEY(idUsuario) REFERENCES  USUARIO (idUsuario),
FOREIGN KEY(idMenu) REFERENCES Menu (idMenu)
); 

CREATE TABLE Usuário x Perfil 
( 
 idUsuario INT,  
 idCategoria INT,  
FOREIGN KEY(idUsuario) REFERENCES Usuários (idUsuario),
FOREIGN KEY(idCategoria) REFERENCES Categoria (idCategoria)
); 
