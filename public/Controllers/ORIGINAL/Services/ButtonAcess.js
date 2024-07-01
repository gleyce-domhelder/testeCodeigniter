import React from 'react';
import CIRoute from '../Config/CIRoute';
const ButtonAcess = ({ route, routes }) => {
  if (!routes || !Array.isArray(routes)) {
    throw new Error('Routes is not defined or not an array');
  }

  const allowedKeys = [1, 2, 3]; // adjust this to your needs
  const hasAccess = routes.some((item) => item.path === route && allowedKeys.includes(item.key));

  return hasAccess;
};

export default ButtonAcess;
// ciRouteInstance.before().then((allowedRoutes) => {
//   const hasAccess = routes.some((item) => item.path === route && allowedRoutes.includes(item.key));
//   return hasAccess;
// });