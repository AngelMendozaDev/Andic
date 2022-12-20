use andic;

CREATE VIEW getInstAct AS SELECT * FROM institucion WHERE estado = 1;

CREATE VIEW getpracticasact AS SELECT pr.folio_p, pr.tipo ,p.nombre, p.app, p.apm, i.nombre_ins, s.service, pr.estado, pr.proy FROM practicas AS pr INNER JOIN persona AS p ON p.id_p = pr.persona INNER JOIN servicios AS s ON s.registro_c = pr.institucion INNER JOIN institucion AS i ON i.clave = s.inst WHERE pr.estado <5;

Select  * from getInstAct;