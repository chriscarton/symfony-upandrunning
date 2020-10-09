# Méthode naive

    public function createNaive(Request $request, EntityManagerInterface $em)
    {
        if($request->isMethod('POST')){
            $data = $request->request->all;

            $pin = new Pin;
            $pin->setTitle($data['title']);
            $pin->setDescription($data['description']);
            $em->persist($pin);
            $em->flush();

            return $this->redirect('/');
        }
    }
