import React from 'react';
import { routes } from '../Config/routes.config';
import ButtonAcess from '../Services/ButtonAcess';

const AcessButton = ({ route }) => {
  const hasAccess = ButtonAcess({ route, routes });
  return hasAccess;
};

export default AcessButton;