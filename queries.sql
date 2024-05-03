CREATE TABLE Perfil x Menu 
( 
 idUsuários INT,  
 idMenu INT,  
  FOREIGN KEY(idUsuários) REFERENCES Usuários (idUsuários),
FOREIGN KEY(idMenu1) REFERENCES Menu (idMenu)
); 

CREATE TABLE Usuário x Perfil 
( 
 idUsuários INT,  
 idPerfil INT,  
FOREIGN KEY(idUsuários) REFERENCES Usuários (idUsuários),
DD FOREIGN KEY(idPerfil) REFERENCES Perfil (idPerfil)
); 
