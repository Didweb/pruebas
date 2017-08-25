#!groovy

node{
  // -------------------------------
  // ----- STAGE: 'Pull'
  // -------------------------------
  stage ('Pull'){
    echo 'Machen PULL'
    sh 'rm -rf *'



  }

  // -------------------------------
  // ----- STAGE: 'Test'
  // -------------------------------
  stage ('Test'){
    echo "Test"

    sshagent (credentials: ['d1c5134e-8909-41d1-b88c-5f626f3be72d']) {
                     sh '''
                        git git@github.com:Didweb/pruebas.git

                        git config --global user.name "Eduardo Pinuaga"
                        git config --global user.email info@did-web.com
                        git commit -am 'Bumped version number [ci skip]'
                        git push origin master
                     '''
                  }
  }




  // -------------------------------
  // ----- STAGE: 'Push'
  // -------------------------------
  stage ('Push_branch_Test'){
      echo "PUSH"

      if (BRANCH_NAME == "master") {
                  echo " rama = ${BRANCH_NAME} "
               }
               else {
                  echo "Estas en --->> ${BRANCH_NAME}"
               }

 }

}
