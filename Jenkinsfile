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

    sshagent (credentials: ['e276113e-0ec9-4eaa-88f9-a7db5c9635b6']) {
                     sh '''
                        git clone git@pruebas.git

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
