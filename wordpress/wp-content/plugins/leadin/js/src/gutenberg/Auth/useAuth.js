import { useEffect, useState } from 'react';
import { getAuth } from '../../api/hubspotPluginApi';

export default function useAuth() {
  const [auth, setAuth] = useState(false);
  const [loading, setLoading] = useState(true);

  function handleEffect() {
    getAuth(response => {
      setAuth(!!response);
      setLoading(false);
    }, handleEffect);
  }

  useEffect(handleEffect, []);

  return { auth, loading };
}
